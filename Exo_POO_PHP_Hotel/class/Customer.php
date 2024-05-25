<?php
class Customer{
    private int $idCustomer;
    private string $firstName;
    private string $lastName;
    private array $bookings; 

    // Constructor
    public function __construct(int $idCustomer, string $firstName, string $lastName){
        $this->idCustomer = $idCustomer;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->bookings=[];
    }

    //toString
    public function __toString(){
        return $this->firstName." ".$this->lastName;
    }

    //getinfo
    public function getInfo(){
        return "idCustomer : $this->idCustomer \n firstName : $this->firstName \n lastName : $this->lastName";
    }
    public function addBooking(Booking $booking){
        $this->bookings[]=$booking;
    }

    public function getReservations(): string{
        $title="<h2>Liste des réservations de ".$this."</h2>";
        $price=0;
        $reservation="<ol>";
        $dateFormat=" d-m-Y";
/*Réservations de Micka MURMANN
2 RÉsERvAT|oNs
Hotel: Hilton **** Strasbourg X Chambre : 3 (2 lits - 120 € - Wifi : non) du 11 03-2021 au 15 03 2021
Hotel : Hilton **** Strasbourg 1' Chambre : 4 (2 lits - 120 € - Wifi : non) du 01 04-2021 au 17 04-2021
Total : 2400 € */
        if(count($this->bookings)>0){
        foreach($this->bookings as $booking){ // récupération de toutes les reservation de la chambre en cours
            ($booking->getRoom()->getWifi())? $wifi="Oui" : $wifi="Non";
            $price+=$booking->getRoom()->getPrice();
            $reservation.="<li><strong>";
            $reservation.=$booking->getRoom()->getHotel()->getHotelName()."</strong> / ";
            $reservation.=$booking->getRoom()->getRoomName()." - (";
            $reservation.=$booking->getRoom()->getNbrBeds()." lits - ";
            $reservation.=$booking->getRoom()->getPrice()."€ - wifi : $wifi) éffectué le";
            $reservation.=$booking->getDateBooking()->format($dateFormat)." pour la période du ";
            $reservation.=$booking->getDateEntry()->format($dateFormat)." au ";
            $reservation.=$booking->getDateLeaving()->format($dateFormat)."</li>";
        }
    }
    else{
        $reservation.="<li><strong>Aucune réservation !</strong></li>";
    }

    $reservation.="</ol><h3> Total : $price €</h3>";
    $title.="<p><strong>".count($this->bookings)." réservations enregistrées</strong></p>".$reservation;

    return $title;
      }

    //getters and setters
  

    /**
     * Get the value of idCustomer
     */ 
    public function getIdCustomer()
    {
        return $this->idCustomer;
    }

    /**
     * Set the value of idCustomer
     *
     * @return  self
     */ 
    public function setIdCustomer($idCustomer)
    {
        $this->idCustomer = $idCustomer;

        return $this;
    }

    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }
}