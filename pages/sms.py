import mysql.connector
from twilio.rest import Client

# Your Account SID from twilio.com/console
account_sid = "ACeddfc01bcf4d952c065ddce73d8932d0"
# Your Auth Token from twilio.com/console
auth_token  = "3e39d516dae018a06034b1259f613964"

client = Client(account_sid, auth_token)



connection = mysql.connector.connect(
    host='localhost',
    database='systemdb',
    user='root',
    password='')

sql_scanStatus = "select * from scanstatus"
cursor = connection.cursor()
cursor.execute(sql_scanStatus)
    # get all records
records_status_scan = cursor.fetchall()
# print("Total number of rows in table: ", cursor.rowcount)

# print("\nPrinting each row")

for row in records_status_scan:
    # print("scanID = ", row[0], )
    # print("studentID = ", row[1])
    # print("status = ", row[2])

scanID = row[0]
studentID = row[1]
status = row[2]



sql_select_Query ="select * from students WHERE studentID ="+str(studentID)
# print(sql_select_Query)

cursor = connection.cursor()
cursor.execute(sql_select_Query)
    # get all records
records = cursor.fetchall()
print("Total number of rows in table: ", cursor.rowcount)

print("\nPrinting each row")

for row in records:
    # print("Id = ", row[0], )
    # print("First Name = ", row[1])
    # print("Middle Name  = ", row[2])
    # print("Last Name   = ", row[3], "")
    # print("Gender   = ", row[4], "")
    # print("Guardian   = ", row[5], "")
    # print("Contact   = ", row[6], "")
    fname= row[1]
    lname = row[3]
    guardian = row[5]
    gen = row[4]
    phone = row[6]

if gen == "MALE":
    gender = "son"
    print(gender)
elif gen == "FEMALE":
    gender = "daughter"
    print(gender)

if status == "IN":
    stat = "arrived"
    print(stat)
elif status == "OUT":
    stat = "left"
    print(stat)


mess ="Good day "+guardian+" your "+gender+", "+fname+" "+lname+","+" just "+stat+" at our school"
print(mess)

message = client.messages.create(
    to={phone},
    from_="+19896013568",
    body={mess})
print(message.sid)








