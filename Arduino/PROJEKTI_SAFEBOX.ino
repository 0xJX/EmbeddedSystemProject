#include <dht.h>

dht DHT;

#define DHT11_PIN 7                         //lämpö/kosteus input

int motion = 2;                             //liiketunnistimen input

//-----MQ2---------- 
//vakiot helposti muokattavissa!!!!

#define MQ2_PIN (A5)                        //sensorin input
#define RL_VALUE (10)                       //kortin vastus kilo-ohmeina                            
#define RO_CLEAN_AIR_FACTOR (9.83)          //=(sensorin vastus puhtaassa ilmassa)/RO

#define CALIBRATION_SAMPLE_TIMES (50)              //montako näytettä otetaan kalibroinnissa        PERUS: 50
#define CALIBRATION_SAMPLE_INTERVAL (100)          //näytteenoton aikaväli (MS)                     PERUS: 500


#define READ_SAMPLE_TIMES (5)               //montako näytettä otetaan normaalissa mittauksessa     PERUS: 5
#define READ_SAMPLE_INTERVAL (50)           //näytteenoton aikaväli normaalissa mittauksessa (MS)   PERUS: 50

#define GAS_LPG (0)                         //Gas "id"
#define GAS_SMOKE (1)

float LPGCurve[3]  =  {2.3,0.2,-0.45};      //excelissä lasketut logaritmiarvot datasheetin kuvaajasta (x, y, kulmakerroin)
float SmokeCurve[3] = {2.3,0.53,-0.42};     

float Ro = 10;                              //kilo-ohmeja




void setup(){

pinMode(MQ2_PIN, INPUT);
pinMode(motion, INPUT);
pinMode(LED_BUILTIN, OUTPUT);

  Serial.begin(9600);
  
  Serial.print("Kalibroidaan MQ-2...\n");                
  Ro = MQCalibration(MQ2_PIN);                       //sensorin kalibrointi tulee tehdä puhtaassa ilmassa
                                                                      
  Serial.println("Kalibrointi valmis"); 
  Serial.print("Ro=");
  Serial.print(Ro);
  Serial.print("kohm");
  Serial.print("\n");
  Serial.print("\n");

}

void loop(){
  
  int chk = DHT.read11(DHT11_PIN);
  
  
  String temp = "TEMP:" + String(DHT.temperature) + ":";
  String hum = "HUM:" + String(DHT.humidity) + ":";
  String moti = "MOTION:" + String(digitalRead(motion)) + ":";
  String LPG = "LPG:" + String(MQGetGasPercentage(MQRead(MQ2_PIN)/Ro,GAS_LPG)) + ":";
  String SMOKE = "SMOKE:" + String(MQGetGasPercentage(MQRead(MQ2_PIN)/Ro,GAS_SMOKE)) + ":";
  
  
    
  Serial.println(temp);     //lämpötila celsius-asteina
  
  Serial.println(hum);      //ilmankosteus prosentteina
 
  Serial.println(moti);     //bool

  Serial.println(LPG);      //PPM
  
  Serial.println(SMOKE);    //PPM
  
  Serial.println(" ");


  //--------TESTAUSTA VARTEN----------

  /*Serial.print(DHT.temperature);
  Serial.print(", ");
  Serial.println(DHT.humidity);*/
  
  delay(1000);                            //pitkä delay koska lämpö/kosteusanturi ei pysy perässä
}


float MQResistanceCalculation(int raw_adc)                  //lasketaan sensorin vastus raakadatasta
{
  return ( ((float)RL_VALUE*(1023-raw_adc)/raw_adc));
}



float MQCalibration(int mq2_pin)
{
  int i;
  float val=0;

  digitalWrite(LED_BUILTIN, HIGH);
 
  for (i=0;i<CALIBRATION_SAMPLE_TIMES;i++) {                //otetaan puhtaasta ilmasta useampi näyte
    val += MQResistanceCalculation(analogRead(mq2_pin));
    delay(CALIBRATION_SAMPLE_INTERVAL);
  }
  val = val/CALIBRATION_SAMPLE_TIMES;                       //lasketaan keskiarvo otetuista näytteistä
 
  val = val/RO_CLEAN_AIR_FACTOR;                            //keskiarvo jaettuna RO_CLEAN_AIR_FACTOR:illa tuottaa Rs/Ro:n 
                                                            //(y-akseli datasheetin kaaviossa)
 digitalWrite(LED_BUILTIN, LOW);
 
  return val; 
}



float MQRead(int mq_pin)                                    //luetaan sensoria... 
{                                                           //palauttaa keskiarvon useammasta mittauksesta
  int i;
  float rs=0;
 
  for (i=0;i<READ_SAMPLE_TIMES;i++) {
    rs += MQResistanceCalculation(analogRead(mq_pin));
    delay(READ_SAMPLE_INTERVAL);
  }
 
  rs = rs/READ_SAMPLE_TIMES;
 
  return rs;  
}


int MQGetGasPercentage(float rs_ro_ratio, int gas_id)
{
  if ( gas_id == GAS_LPG ) {
     return MQGetPercentage(rs_ro_ratio,LPGCurve);
     }
  else if ( gas_id == GAS_SMOKE ) {
     return MQGetPercentage(rs_ro_ratio,SmokeCurve);
  }    
 
  return 0;
}



int  MQGetPercentage(float rs_ro_ratio, float *pcurve)
{
  return (pow(10,( ((log(rs_ro_ratio)-pcurve[1])/pcurve[2]) + pcurve[0])));
}
