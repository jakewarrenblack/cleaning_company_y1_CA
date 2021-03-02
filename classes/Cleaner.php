<?php



// Race is a class that has id, name, date, sponsor and category as variables/attributes of the class
class Cleaner {
    public $id;
    public $Supervisor_ID;
    public $Cleaner_Name;
    public $Cleaner_Email;
    public $Cleaner_Phone;
    public $Cleaner_PPS;
    public $Cleaner_Rate;
    public $Cleaner_Type;
    
    
    
        public function save() {
        $params = array(
            'Supervisor_Name' => $this->Supervisor_ID,
            'Cleaner_Name' => $this->Cleaner_Name,
			'Cleaner_Email' => $this->Cleaner_Email,
            'Cleaner_Phone' => $this->Cleaner_Phone,
            'Cleaner_PPS' => $this->Cleaner_PPS,
            'Cleaner_Rate' => $this->Cleaner_Rate,
            'Cleaner_Type' => $this->Cleaner_Type,
			
            
        );

        $sql = "INSERT INTO cleaner_tbl(
                Supervisor_ID, Cleaner_Name, Cleaner_Email, Cleaner_Phone, Cleaner_PPS, Cleaner_Rate, Cleaner_Type
                ) VALUES (
                    :Supervisor_Name, :Cleaner_Name, :Cleaner_Email, :Cleaner_Phone, :Cleaner_PPS, :Cleaner_Rate, :Cleaner_Type)";

        $conn = Connection::getInstance();
        $stmt = $conn->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to save Cleaner");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error saving Cleaner");
            }
           
            $this->id = $conn->lastInsertId('Cleaner');
            
        }
    }

// ------------------------------------------------------------MY ATTEMPT AT A DELETE FUNCTION------------------------------------------------ //

public function deleteRow($Cleaner_Name){

    $params = array(
        'Supervisor_Name' => $this->Supervisor_ID,
        'Cleaner_Name' => $this->Cleaner_Name,
        'Cleaner_Email' => $this->Cleaner_Email,
        'Cleaner_Phone' => $this->Cleaner_Phone,
        'Cleaner_PPS' => $this->Cleaner_PPS,
        'Cleaner_Rate' => $this->Cleaner_Rate,
        'Cleaner_Type' => $this->Cleaner_Type,
        
        
    );

try{
    $pdo = new PDO("mysql:host=localhost;dbname=cleaning_db", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

try{
    $sql = "DELETE FROM cleaner_tbl WHERE Cleaner_Name= " .$Cleaner_Name;  
    $pdo->exec($sql);
    echo "Records were deleted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not execute $sql. " . $e->getMessage());
}

unset($pdo);
}

// ------------------------------------------------------------MY ATTEMPT AT A DELETE FUNCTION------------------------------------------------ //

   
    // The Race class has one method at the moment - selectAll()

    public static function selectAll() {
 
        // $sql is a variable that has the text SELECT * FROM races
        $sql = 'SELECT * FROM cleaner_tbl';
        
        // can you figure out where the method getInstance() is located. 
        $connection = Connection::getInstance();
        
        //  we now have a connection to the database, next step is the prepare the statement that will be sent to the database
        $stmt = $connection->prepare($sql);
        
        // $stmt->execute(); sends the statement (SELECT...) you prepared above to the database for executing.
        // $success will either be true or false
        $success = $stmt->execute();
        
        
        if (!$success) {
            throw new Exception("Failed to retrieve cleaners");
            throw new Exception("Failed to retrieve cleaners");
        }
        
        // if the statement was executed correctly get all the races in the class format 'Race' and put it in an array called $races
        else {
            $cleaners = $stmt->fetchAll(PDO::FETCH_CLASS, 'Cleaner');
            
            // return $races to the code that called this method (have a look at the code in index.php to see where this is returned to)
            return $cleaners;
        }
    }
	
    ///////////////////////SELECT BY CATEGORY//////////////////////////
       public static function selectByCategory($Supervisor_ID) {
		
	
    
        $sql = "SELECT id FROM Supervisor_tbl WHERE Supervisor_Name = '" . $Supervisor_ID ."'" ;
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve cleaners");
        }
        else {
            $Supervisor_ID = $stmt->fetch()[0];
						
			$sql = 'SELECT * FROM cleaner_tbl WHERE Supervisor_ID = ' . $Supervisor_ID;
			$connection = Connection::getInstance();
			$stmt = $connection->prepare($sql);
			$success = $stmt->execute();
			if (!$success) {
				throw new Exception("Failed to retrieve races");
			}
			else {
				$cleaners = $stmt->fetchAll(PDO::FETCH_CLASS, 'Cleaner');
				return $cleaners;
			}
        }
    }

    
        public static function find($id) {
        $params = array(
            'id' => $id
        );
        $sql = 'SELECT * FROM cleaner_tbl WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to retrieve race");
        }
        else {
            $cleaner = $stmt->fetchObject('Cleaner');
            return $cleaner;
        }
    }
    
    
    
   
}
?>
