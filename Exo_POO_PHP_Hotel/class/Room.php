<?php
class Room{
    private int $idRoom;
    private string $roomName;
    private float $price;
    private bool $wifi;
    private bool $available;
    private Hotel $hotel;
    private array $bookings; 
    private int $nbrBeds;

    //constructeur
    public function __construct(int $idRoom, string $roomName, float $price, bool $wifi, bool $available, int $nbrBeds, Hotel $hotel){
        $this->idRoom = $idRoom;
        $this->roomName = $roomName;
        $this->price = $price;
        $this->wifi = $wifi;
        $this->available = $available;
        $this->hotel = $hotel;
        $this->hotel->addRoom($this); // on ajoute la chambre de l'Hotel à chaque nouvelle création de chambre
        $this->bookings=[];
        $this->nbrBeds=$nbrBeds;
    }
  
    //toString
    public function __toString(): string{
        return $this->roomName." (".$this->hotel.")";
    }

    //getInfo
    public function getInfo(): string{
        return "idRoom: ".$this->idRoom." roomName: ".$this->roomName." Price: ".$this->price." Wifi: ".$this->wifi." Available: ".$this->available." Hotel: ".$this->hotel;
    }

    // addBoking objet in Romm
    public function addBoking(Booking $booking){
        $this->bookings[]=$booking;
    }

    //getters and setters
    public function getNbrBeds(): int{
        return $this->nbrBeds;
    }
    public function getBookings(): array{
        return $this->bookings;
    }
    /**
     * Get the value of idRoom
     */ 
    public function getIdRoom()
    {
        return $this->idRoom;
    }

    /**
     * Set the value of idRoom
     *
     * @return  self
     */ 
    public function setIdRoom($idRoom)
    {
        $this->idRoom = $idRoom;

        return $this;
    }

    /**
     * Get the value of roomName
     */ 
    public function getRoomName()
    {
        return $this->roomName;
    }

    /**
     * Set the value of roomName
     *
     * @return  self
     */ 
    public function setRoomName($roomName)
    {
        $this->roomName = $roomName;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of wifi
     */ 
    public function getWifi()
    {
        return $this->wifi;
    }

    /**
     * Set the value of wifi
     *
     * @return  self
     */ 
    public function setWifi($wifi)
    {
        $this->wifi = $wifi;

        return $this;
    }

    /**
     * Get the value of available
     */ 
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set the value of available
     *
     * @return  self
     */ 
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get the value of hotel
     */ 
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * Set the value of hotel
     *
     * @return  self
     */ 
    public function setHotel($hotel)
    {
        $this->hotel = $hotel;

        return $this;
    }
}
 