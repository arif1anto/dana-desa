<?php 

    global $base_url;
    $base_url = "http://".$_SERVER['SERVER_NAME']."/spk/";

    define('BASE_URL', $base_url);

    session_start();
    if (!isset($_SESSION["login"])) {
        $url = $_SERVER['REQUEST_URI'];
        $ex = explode("/", $url);
        $file = $ex[count($ex)-1];
        if ($file!="login.php") {
            header("location:".$base_url."login.php");
        }
    }
    
	function rp($rp) {
		$hasil = number_format($rp, 0, "", ".");
		return $hasil;
	}	

    function opendb()
    {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "dana_desa";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		} else {
			return $conn;
		}
    }

    function query($query)
    {
    	$conn = opendb();
        $result = mysqli_query($conn,$query) or die ("Gagal melakukan query = $query <br> ".mysqli_error($conn));
        return $result;
    }

    function fetch_array($a)
    {
        $result = mysqli_fetch_array($a);
        return $result;
    }

    function inc($param)
    {
    	$base = "";
		$ex = explode("/", $_SERVER['REQUEST_URI']);
		for ($i=0; $i < count($ex)-3; $i++) { 
			$base .="../";
		}
    	// echo "RURI = ".$_SERVER['REQUEST_URI'];
    	// echo "base = ".$base;
    	switch ($param) {
    		case 'header':
    			include $base.'template/header.php';
    			break;
    		case 'menu':
    			include $base.'template/menu.php';
    			break;
    		case 'footer':
    			include $base.'template/footer.php';
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    }

    function fisik_rumah($a='')
  {
    switch ($a) {
      case '5':
        return "Layak";
        break;
      case '3':
        return "Cukup Layak";
        break;
      case '1':
        return "Kurang Layak";
        break;
      
      default:
        return "";
        break;
    }
  }

  function penghasilan($a='')
  {
    switch ($a) {
      case '100':
        return "< 1.000.000";
        break;
      case '80':
        return "1.000.001 - 1.500.000";
        break;
      case '60':
        return "1.500.001 - 2.000.000";
        break;
      case '40':
        return "2.000.001 - 2.500.000";
        break;
      case '20':
        return "2.500.001 - 3.000.000";
        break;
      case '10':
        return "> 3.000.000";
        break;
      
      default:
        return "";
        break;
    }
  }
	

?>
