<?php
    $developer = 'Alexander Kingson'; // Please replace with your name
    $color = isset($_GET['color']) ?: '#C00';
    //check if data_file variable is set    
    $data_file=isset($_GET['data_file'])?$_GET['data_file']:'data.csv'; 
    abstract class Reader {
        public $file_handle;
        public function __construct($url){
         $this->file_handle=fopen($url, 'r');
         if(!$this->file_handle)
            {
              error_log("unable to open source file ".$url);
              echo('Unable to read data, please contact administration.  Thanks for your patience.');
              exit(1);
            }
        }

        public function __destruct(){
          fclose($this->file_handle);
        }
        abstract public function getData(&$data);
       
    }
    class CSVReader extends Reader {
        
        public function getData(&$data) {
            while ($line = fgets($this->file_handle)) {
                $data []= explode(',', str_replace("\r\n", '', $line));
            }
        }
        
    }
    class JsonReader extends Reader {
      private $file_name;
       
      public function __construct($url)
      {
        parent::__construct($url);
        $this->file_name=$url;
      }
       
      public function getData(&$data)
      {
        $data=json_decode(fread($this->file_handle, filesize($this->file_name)));
      }
    }
    //use strategy pattern to initialze appropriate class
    class StrategyContext {
       private $strategy = NULL; 
       public function __construct($strategy_id) 
       {
         switch ($strategy_id) {
         case "new_data": 
            $this->strategy = new JsonReader('new_data');
          break;
         default:
            $this->strategy = new CSVReader('data.csv');
      }
    }
    public function getData(&$data) {
       $this->strategy->getData($data);
    }
  } 
    ?>
    <html>
    <head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.js"></script>
    <script type="text/javascript" src="chart.js"></script>
    <style>
        #chart {
            position: relative;
            border-bottom: 1px #000 solid;
            border-left: 1px #000 solid;
            height: 200px;
        }
        
        #chart .value {
            background-color: #f00;
            bottom: 0;
            position: absolute;
            background: -webkit-gradient(linear, left top, left bottom, from(<?php echo $color ?>), to(#000));
            background: -moz-linear-gradient(top,  <?php echo $color ?>,  #000);
            padding: 0.1%;
            color: #fff;
        }
    </style>
    </head>
    <body>
    Litres of beer consumed per week by <?php echo  $developer ?><br><br>
    <div id="chart">
<?php
    //create empty array to have reference to
    $data=array();
    $reader = new StrategyContext($data_file);
    //$reader = new JsonReader('new_data');
    $reader->getData($data);
    if(!empty($data))
    { 
      //foreach ($data as &$values) {
      //We remove referencing & in front of $values. No need to use referencing in this loop. Otherwise it must be unset after foreach loop. 
      foreach ($data as $values)
      {
        //calculate weeks passed. Divide time passed by number of seconds in a week 60*60*24*7=604800
        $week_ago=round((time()-$values[0])/604800);
        echo '<div class="value" timestamp="' . $values[0] . '" value="' . $values[1] . '" title="' . $week_ago . ': ' . $values[1] . '"></div>';
      }
    }
    else
    {
      echo 'dataset is empty';
    }
?>
</div>
</body>
</html>
