#!/usr/bin/env python
#!/usr/bin/python
import MySQLdb
import serial
import time

arduino = serial.Serial(port='/dev/ttyACM0', baudrate=9600)
arduino.timeout = 1

tempdata = "0"
humdata = "0"
motidata = "0"
lpgdata = "0"
smokedata = "0"
nulldata = "NULL"

bDataCollected = 0
maxData = 5

def SaveToDB():
	print("Trying to connect to DB")
	try:
		db = MySQLdb.connect(host="192.168.1.152",user="jani",passwd="Testtest1",db="safetybox", connect_timeout=5)
		cur = db.cursor()
		# Use all the SQL you like
		sql = "INSERT INTO dataset (RowCount, TEMP, HUM, MOTION, LPG, SMOKE) VALUES (NULL, %s, %s, %s, %s, %s);"
		val = (tempdata[1], humdata[1], motidata[1], lpgdata[1], smokedata[1])
		cur.execute(sql, val)
		db.commit()
		result = cur.fetchone()
		print(result)
		print("Saved data to DB!")
		
		warning = 1
		alertmsg = ['No alerts']

		if(float(smokedata[1]) > 400 and float(motidata[1]) != 0 and float(humdata[1]) > 80):
			alertmsg = ['Smoke, motion and high humidity detected!']
		elif(float(smokedata[1]) > 400 and float(motidata[1]) != 0):
			alertmsg = ['Smoke and motion detected!']
		elif(float(smokedata[1]) > 400 and float(humdata[1]) > 80):
			alertmsg = ['Smoke and high humidity detected!']
		elif(float(motidata[1]) != 0 and float(humdata[1]) > 80):
			alertmsg = ['Motion and high humidity detected!']
		elif(float(smokedata[1]) > 400):
			alertmsg = ['Smoke detected!']
		elif(float(motidata[1]) != 0):
			alertmsg = ['Motion detected!']
		elif(float(humdata[1]) > 80):
			alertmsg = ['High humidity detected!']
		else:
			warning = 0
			
		if(warning == 1):
			sql = "INSERT INTO alert (ISALERT, ALERTTEXT) VALUES (1, %s);"
			cur.execute(sql, alertmsg)
			db.commit()
			result = cur.fetchone()
			print(result)
			print("Warning set to db.")
			
		db.close()
	except Exception as e:
		print("Error:")
		print(e)

if arduino.is_open:
    while True:
        size = arduino.inWaiting()
        if size:
            data = arduino.readline()
            if "TEMP" in data:
			 tempdata = data.split(":")
			 print("Received temp! ", tempdata[1])
            elif "HUM" in data:
			 humdata = data.split(":");
			 print("Received hum! ", humdata[1])
            elif "MOTION" in data:
			 motidata = data.split(":");
			 print("Received motion! ", motidata[1])
            elif "LPG" in data:
			 lpgdata = data.split(":");
			 print("Received lpg! ", lpgdata[1])
            elif "SMOKE" in data:
			 smokedata = data.split(":");
			 print("Received smoke! ", smokedata[1])
            time.sleep(0.15)
            
            if(bDataCollected < maxData):
				bDataCollected += 1
            else:
				SaveToDB()
				bDataCollected = 0
else:
    print("Arduino serial not open")
