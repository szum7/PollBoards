<?php

/**
 * Description of Entity
 *
 * @author Szum
 */
abstract class Entity {
    
    protected $data = array();
    /* id : int
     * name : string
     * description : description
     * authorId : int
     * createdDate : date
     * lastEditedDate : date
     */
    
    public function __construct($connection_id, $id, $objectType) {
        
        $this->data["id"] = $id;
        $this->data["objectType"] = $objectType;
        
        $query = "
            SELECT * 
            FROM " . $this->data["objectType"] . "s, users 
            WHERE aid = " . $this->data["id"] . "
            AND users.uid = answers.author
            LIMIT 1;";
        $result = mysqli_query($connection_id, $query) or die("404" . $query);

        if (mysqli_num_rows($result) > 0) {
            
            $row = mysqli_fetch_assoc($result);
            
            $this->data["name"] = $row["name"];
            $this->data["description"] = $row["description"];
            $this->data["authorId"] = $row["author"]; // ... author
            $this->data["createdDate"] = $row["created"];
            $this->data["lastEditedDate"] = $row[""];
        }
    }
    
}

class Answer extends Entity{
    
    protected $publicEnum; // enum
    protected $wikiLink;
    protected $profilImage;
    protected $ratedCount;
    
    public function __construct($id, $objectType) {
        parent::__construct($id, $objectType);
        
        $query = "
            SELECT * 
            FROM answers 
            WHERE aid = " . $this->data["id"] . "
            LIMIT 1;";
        $result = mysqli_query($connection_id, $query) or die("404" . $query);

        if (mysqli_num_rows($result) > 0) {
            
            $row = mysqli_fetch_assoc($result);
            
            $this->data[""] = $row[""];
            $this->data[""] = $row[""];
            $this->data[""] = $row[""];
            $this->data[""] = $row[""];
        }
    }
    
}

class Poll extends Entity{
    
    protected $newAnswersEnum;
    protected $answerTypeEnum;
    protected $isActive;
    protected $questionRatedCount;
    protected $resultRatedCount;
    
}

class Group extends Entity{
    
    protected $password;
    protected $membersCount;
    protected $profilImage;
    protected $ratedCount;
    
}
