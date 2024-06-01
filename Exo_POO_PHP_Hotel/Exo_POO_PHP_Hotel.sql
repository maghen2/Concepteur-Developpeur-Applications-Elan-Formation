Sub Create_Tables()

DoCmd.RunSQL "CREATE TABLE Hotel(" & _
   "id_hotel INT," & _
   "hotel_name VARCHAR(255) NOT NULL," & _
   "adress VARCHAR(255)," & _
   "zip_code VARCHAR(50)," & _
   "city VARCHAR(255)," & _
   "total_rooms INT," & _
   "PRIMARY KEY(id_hotel)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Room(" & _
   "id_room INT," & _
   "room_name VARCHAR(255)," & _
   "price DECIMAL(15,2)," & _
   "wifi LOGICAL," & _
   "available LOGICAL," & _
   "id_hotel INT NOT NULL," & _
   "PRIMARY KEY(id_room)," & _
   "FOREIGN KEY(id_hotel) REFERENCES Hotel(id_hotel)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Customer(" & _
   "id_customer INT," & _
   "firstname VARCHAR(255)," & _
   "lastname VARCHAR(255)," & _
   "PRIMARY KEY(id_customer)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Book(" & _
   "id_room INT," & _
   "id_customer INT," & _
   "date_booking DATETIME," & _
   "dateEntry DATETIME," & _
   "dateLeaving DATETIME," & _
   "PRIMARY KEY(id_room, id_customer)," & _
   "FOREIGN KEY(id_room) REFERENCES Room(id_room)," & _
   "FOREIGN KEY(id_customer) REFERENCES Customer(id_customer)" & _
");"   

End Sub