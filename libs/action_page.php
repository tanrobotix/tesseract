<?php
		class searcharray
		{
			protected $conn;
			protected $search_array;
			function connection{
				if($this->conn){
					$this->conn = mysqli_connect('localhost', 'root');
					mysqli_select_db($this->conn,"medicine") 
					or die(mysqli_error($this->conn, "Can not connect to the DATABASE");
					/*mysqli_query($this->conn, "SET 
						character_set_result='utf8',
					 	character_set_client='utf8',
						character_set_server='utf8'";);*/
					mysqli_set_charset($this->conn,"utf8");
				}
			}
			function dis_connect{
				if($this->conn){
					mysqli_close($this->conn);}
			}
			function search{
				if(isset($_REQUEST['s_butt'])){
					$this->search_array = $_REQUEST['arr_search'];
					if($this->search_array != ''){
						$query = mysqli_query($this->conn,
							"SELECT * FROM medicine WHERE TEN LIKE 
							'%$search_array%' OR KEYWORDS LIKE 
							'%$search_array%'")
						or die("Could not search, please try again, fill the form if possible");
					$result = mysqli_num_rows($query);
					if(($this->result) == 0){
						$output .= "Can not find any result with keywords: '$arr_search'";
					} else { //result > 0
						$output .= "All result with keywords: '$arr_search': $result";
						while ($row=mysqli_fetch_array($this->query)){
							$ten = $this->row['TEN'];
							$chidinh = $this->row['CHIDINH'];

							$output .= "$TEN $CONGTHUC $CHIDINH";
						}
					}
				} else { $this->output .= "Please enter your keywords";}
			}
		}
?>