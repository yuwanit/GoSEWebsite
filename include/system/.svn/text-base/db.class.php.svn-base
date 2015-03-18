<?php
class db 
{ 
    var $host;
    var $db;
    var $user;
    var $pass; 
    var $passencode;
    var $conn;
    
    var $tbl_top;
    var $tbl_bottom;
    var $MsgConnDB;
    var $result;

    private $cFunction;
    
    function __construct() {
        $Conf = new Conf();
            
        $this->host = $Conf->host;
        $this->db = $Conf->db;
        $this->user = $Conf->user;
        $this->pass = $Conf->pass;    
        $this->passencode = crc32($Conf->passencode);
        $this->port = $Conf->port;             
            
        $this->connect($this->host, $this->user, $this->pass, $this->db);
        $this->cFunction = new FunctionCore();
    }
       
    function connect($host, $user, $pass, $db) {
    	$this->conn = mysql_connect($host, $user, $pass, true) or die (mysql_error());
        @mysql_query("SET character_set_results = utf8");
        @mysql_query("SET collation_connection = utf8");
        @mysql_query('SET COLLATION_CONNECTION = "utf8_general_ci"');
        @mysql_query("SET NAMES 'utf8'");

        mysql_select_db($this->db);
        if(!mysql_select_db($this->db)) $this->close();      
    }       
    
    function close(){          
        if($this->conn) mysql_close($this->conn);  
    } 
      
    function execute($query, $sp='') { // for insert and update
        global $debugMsg, $pg, $name;
            
            if($debug == 1){
                $debugMsg = "<i>SQL Debug</i> -> <font color=\"#FF0000\">$query</font> <br>\n";
            }
            
            if($query != ""){
                                if($sp == 0){
                                    $this->result = mysql_query($query);
                                }else{
                                    $this->result = $this->_query($query);
                                }                                             
                            }
                            return $this->result;            
       }//end function       
       
       /**
       * @desc Function fetch_array In Class DB
       */
       function fetch_array($result,$run=0){            
            return @mysql_fetch_assoc($result);                    
       }
       
       function fetch_assoc($result,$run=0){            
            
                        $data = mysql_fetch_assoc($result);
                        //mysql_free_result($result);
                        return $data;
                                            
       }       

       /**
       * @desc Function num_rows
       */
       function num_rows($result){
            $this->num =  mysql_num_rows($result);
            return $this->num;   
       }
       
		function quickDataReturnField($db, $id, $field, $fieldReturn, $enc=''){
            $data = $this->quickData($db, $id, $field, $enc);
            return $data[$fieldReturn];
       }

       /**
       * @desc Function Quick
       */
       function quick($sql){
       		return $this->fetch_array($this->execute($sql));
       }
       
       /**
       * @desc Function นับ Record อย่างเร็ว
       * @param string $sql คำสั่ง SQL ที่ต้องการตรวจสอบ retuen ตัวเลข
       */
       function quick_num($sql){
            return $this->num_rows($this->execute($sql));
       }
       
       function checkMax($db,$filed){                        
            $sqlCon = "select max($filed) AS maxvalue from $db";       
            $value = $this->quick($sqlCon);   
            return $value[maxvalue];
        }
       
       function checkRow($db,$id,$fild){
            $fild != "" ? $fild = $fild : $fild = "id";
            $sqlCon = "select * from $db where $fild='$id' ";
            $value = $this->quick_num($sqlCon);
            return $value;
        }
       
       /**
       * @desc Function Quick_fetch_array
       * @param string $sql คำสั่ง SQL 
       */
       function q_fetch_array($sql,$run=0){            
            return mysql_fetch_array($this->execute($sql));         
       }       
       
             
       
      function getId(){
         return mysql_insert_id();
       }
       
       /**
       * @desc Function errorMsg
       * @param string $
       */
       function errorMsg($value1,$value2) {
            global $title;
            $title = "SQL Error : ";
            $msgHtml = "
                  <font size=\"2\">
                  <u>Error</u> <br>
                  <textarea name=\"error\" rows=\"10\" cols=\"80\" wrap=\"virtual\">คำสั่ง \n $value1 \n\nคำอธิบาย\n $value2</textarea><br>  
                  <img src=\"image/iconmini/email_go.png\" border=\"0\" width=\"16\" height=\"16\" title=\"กรุณาระบุรายละเอียดให้ครบถ้วน (Username , URL ที่ใช้งาน , อาการที่เกิดขึ้น , OS , Browser ที่ใช้งาน )\" align=\"absmiddle\">&nbsp;<a href=\"mailto:bug@dot-serve.com\"  title=\"กรุณาระบุรายละเอียดให้ครบถ้วน (Username , URL ที่ใช้งาน , อาการที่เกิดขึ้น , OS , Browser ที่ใช้งาน )\">ติดต่อเจ้าหน้าที่</a>
                  </font>
            "; 
            echo $msgHtml;      
       }                        
}
?>