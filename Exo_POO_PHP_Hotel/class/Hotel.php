<?php
class Hotel{
    private int $idHotel;
    private string $hotelName;
    private string $adress;
    private string $zipCode;
    private string $city;
    private array $rooms;
    private string $hotelStatus;
    private array $bookings;

    //constructeur
    public function __construct(int $idHotel, string $hotelName, string $adress, string $zipCode, string $city){
      $this->idHotel = $idHotel;
      $this->hotelName = $hotelName;
      $this->adress = $adress;
      $this->zipCode = $zipCode;
      $this->city = $city;
      $this->rooms=[];
      $this->bookings=[];
    }

    //toString
    public function __toString(): string{
      return $this->hotelName." (".count($this->rooms)." chambres)";
    }

    //getInfo
    public function getInfo(): string{
      return " Nom : ".$this->hotelName."\n Nombre de chambres : ".count($this->rooms)."\n Adresse: ".$this->adress." (".$this->zipCode." ".$this->city.")";
    }

    // AddRomms permet d'incrementrer le nombre de chambre
    public function addRoom(Room $room){
        //$this->setTotalRooms($this->getTotalRooms()+$roomQuantity);
        $this->rooms[]= $room;
    }

          /*
      Hilton **** Strasbourg
10 route de la Gare 67000 STRASBOURG
Nombre de chambres: 30
Nombre de chambres réservées: 3
Nombre de chambres dispo: 27
      */
      public function getHotelStatus(): string{
        $hotelStatus="";
        $hotelStatus.="<h2>".$this->getHotelName()."</h2><ul>";
        $hotelStatus.="<li>".$this->getAdress()."</li>";
        $hotelStatus.="<li>Nombre de chambres: ".count($this->getRooms())."</li>";
        $hotelStatus.="<li>Nombre de chambres réservées: ".count($this->bookings)."</li>";
        $hotelStatus.="<li>Nombre de chambres dispo: ".count($this->getRooms())-count($this->bookings)."</li></ul>";
         return $hotelStatus;
      }

      public function addBooking(Booking $booking){
        $this->bookings[]=$booking;
    }
/*
 */
      public function getReservations(): string{
        $title="<h2>Liste des réservations de ".$this."</h2>";
        $reservation="<ol>";
        $dateFormat=" d/m/Y";

        foreach($this->getBookings() as $booking){ // récupération de toutes les reservation de la chambre en cours
            $reservation.="<li>";
            $reservation.=$booking->getCustomer()->getFirstName()." ";
            $reservation.=$booking->getCustomer()->getLastName()." - ";
            $reservation.=$booking->getRoom()->getRoomName()." - reservation effectuée le ";
            $reservation.=$booking->getDateBooking()->format($dateFormat)." pour la période du ";
            $reservation.=$booking->getDateEntry()->format($dateFormat)." au ";
            $reservation.=$booking->getDateLeaving()->format($dateFormat)."</li>";
        }

    $reservation.="</ol>";
    $title.="<p><strong>".count($this->bookings)." réservations enregistrées</strong></p>".$reservation;

    return $title;
      }

      public function getRoomStatus(): string{
        $roomStatus="<table width=250px; border=1 style='border-collapse: collapse; padding: 5px'><caption><h2>Statuts des chambres de ".$this->hotelName."</h2></caption>";
        $roomStatus.="<tr><th>CHAMBRE</th><th>PRIX</th><th>WIFI</th><th>ETAT</th></tr>";
        foreach($this->rooms as $room){
            ($room->getWifi())? $wifi="Oui" : $wifi="Non";
            $classWifi= ($room->getWifi())? "green" : "red";
            $available = ($room->getAvailable())? "Disponible" : "Indisponible";
            $classAvailable = ($room->getAvailable())? "green" : "red";
            $roomStatus.="<tr><td>".$room->getRoomName()."</td><td>".$room->getPrice()."€</td><td class='$classWifi'><span>".$wifi."</span></td><td class='$classAvailable'><span>".$available."</span></td></tr>";;
        }
        
        $roomStatus.="</table>";

        return $roomStatus;
      }

    //getters and setters
    

    /**
     * Get the value of idHotel
     */ 
    public function getBookings(): array {
        return $this->bookings;
    }
    public function getIdHotel()
    {
        return $this->idHotel;
    }

    /**
     * Set the value of idHotel
     *
     * @return  self
     */ 
    public function setIdHotel($idHotel)
    {
        $this->idHotel = $idHotel;

        return $this;
    }

    /**
     * Get the value of hotelName
     */ 
    public function getHotelName()
    {
        return $this->hotelName;
    }

    /**
     * Set the value of hotelName
     *
     * @return  self
     */ 
    public function setHotelName($hotelName)
    {
        $this->hotelName = $hotelName;

        return $this;
    }

    /**
     * Get the value of adress
     */ 
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set the value of adress
     *
     * @return  self
     */ 
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get the value of zipCode
     */ 
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set the value of zipCode
     *
     * @return  self
     */ 
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of totalRooms
     */ 
    public function getTotalRooms()
    {
        return count($this->rooms);
    }


    /**
     * Get the value of rooms
     */ 
    public function getRooms()
    {
        return $this->rooms;
    }

}
 