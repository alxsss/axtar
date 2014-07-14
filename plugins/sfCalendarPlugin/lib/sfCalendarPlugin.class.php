<?php
    class sfCalendarPlugin
    {
        var $events;
        var $name;
        var $past;
        var $future;
        
        public function __construct()
        {
            $this->events = array();
        }
        
        public function addEvent($timestamp, $name)
        {
            $event = new sfCalendarPluginEvent($timestamp, $name);
            $this->events[] = $event;
        }
        
        public function setPastLimit($timestamp)
        {
            $pcs = explode(" ",$timestamp);
            $pcs = explode("-",$pcs[0]);
            if(count($pcs) == 3)
            {
                $this->past = mktime(0,0,0,$pcs[1],$pcs[2],$pcs[0]);
            }
            else
            {
                $this->past = 99999999999999;
            }
        }
        
        public function setFutureLimit($timestamp)
        {
            $pcs = explode(" ",$timestamp);
            $pcs = explode("-",$pcs[0]);
            if(count($pcs) == 3)
            {
                $this->future = mktime(0,0,0,$pcs[1],$pcs[2],$pcs[0]);
            }
            else
            {
                $this->future = 0;
            }
        }
        
        public function save($user)
        {
            $user->setAttribute('sfCalendarPluginClass',$this);
        }
        
        public function RenderAjax($name)
        {
            $this->name = $name;
            ?>
            <style type="text/css">
                .sfCalendarPlugin
                {
                    border-spacing: 0px;
                    padding: 0 0;
                    margin: 0 0; 
                    width: 240px;
                }
                
                .sfCalendarPlugin th
                {
                    width: 30px;
                    height: 25px;
                    text-align: center;
                    background-color: #0063e3;
                    color: white;
                    font-weight: bold;
                    font-size: 10px;
                    padding-top: 0px;
                    margin-top: 0px;
                }
                
                .sfCalendarPlugin thead td
                {
                    border: none;
                    text-align: center;
                    background-color: #0063e3;
                    color: white;
                    font-weight: bold;
                    font-size: 14px;
                }
                
                .sfCalendarPlugin thead a
                {
                    color: white;
                }
                
                .sfCalendarPlugin thead a:visited
                {
                    color: white;
                }
                
                .sfCalendarPlugin td.normal
                {
                    border: solid #0063e3 1px;
                    border-right: none;
                    border-top: none;
                    text-align: center;
                    vertical-align: bottom;
                    font-size: 12px;
                    background-color: white;
                    color: black
                }
                
                .sfCalendarPlugin td.sunday
                {
                    border: solid #0063e3 1px;
                    border-right: none;
                    border-top: none;
                    text-align: center;
                    vertical-align: bottom;
                    font-size: 12px;
                    background-color: white;
                    color: red;
                }
                
                .sfCalendarPlugin td.today
                {
                    border: solid #0063e3 1px;
                    border-right: none;
                    border-top: none;
                    text-align: center;
                    vertical-align: bottom;
                    font-size: 12px;
                    background-color: #0063e3;
                    color: white;
                }
                
                .sfCalendarPlugin div.events
                {
                    width: 15px;
                    color: white;
                    background-color: red;
                    position: relative;
                    text-align: center;
                    vertical-align: top;
                    font-size: 9px;
                    top: -1px;
                    left: -1px;
                    margin: 0 0;
                    padding: 0 0;
                }
                
                .sfCalendarPlugin td.hover
                {
                    border: solid red 2px;
                    border-top: none;
                    border-left: solid #0063e3 1px;
                    text-align: center;
                    vertical-align: bottom;
                    font-size: 12px;
                    background-color: white;
                    color: black;
                    cursor: pointer;
                }
                
                .sfCalendarPlugin td.past
                {
                    border: solid #0063e3 1px;
                    border-right: none;
                    border-top: none;
                    text-align: center;
                    vertical-align: bottom;
                    font-size: 12px;
                    background-color: silver;
                    color: black;
                }
                </style>
                <script language="javascript" type="text/javascript">
                    function choosedate_<?=$name?>(day)
                    {
                        this.document.getElementById('<?=$name?>').value = day;
                        this.document.getElementById('sfCalendarPluginId_<?=$name?>').innerHTML = "";
                    }
                    
                    function showcal_<?=$name?>()
                    {
                        xmlhttpPost_<?=$name?>('/sfCalendarPlugin/index');
                    }
                    
                    function xmlhttpPost_<?=$name?>(strURL) {
                        var xmlHttpReq = false;
                        var self = this;
                        // Mozilla/Safari
                        if (window.XMLHttpRequest) {
                            self.xmlHttpReq = new XMLHttpRequest();
                        }
                        // IE
                        else if (window.ActiveXObject) {
                            self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        self.xmlHttpReq.open('POST', strURL, true);
                        self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        self.xmlHttpReq.onreadystatechange = function() {
                            if (self.xmlHttpReq.readyState == 4) {
                                updatepage_<?=$name?>(self.xmlHttpReq.responseText);
                            }
                        }
                        self.xmlHttpReq.send();
                    }
                    
                    function updatepage_<?=$name?>(str){
                        document.getElementById("sfCalendarPluginId_<?=$name?>").innerHTML = str;
                    }
                </script>
                <input type="text" name="<?=$name?>" id="<?=$name?>" value="" readonly="readonly" onclick="showcal_<?=$name?>()" />
                <input type="button" value="..." onclick="showcal_<?=$name?>()" />
                <div id="sfCalendarPluginId_<?=$name?>"></div>
            <?php
        }
        
        public function getDayEvents($day, $month, $year)
        {
            $count = 0;
            foreach($this->events as $event)
            {
                $data = $event->getDate();
                $pcs = explode(" ",$data);
                $pcs = explode("-",$pcs[0]);
                if(count($pcs) == 3)
                {
                    $e_year = $pcs[0];
                    $e_month = $pcs[1];
                    $e_day = $pcs[2];
                    
                    if($day == $e_day && $month == $e_month && $year == $e_year)
                        $count++;
                }
            }
            return $count;
        }
    }
    
    class sfCalendarPluginEvent
    {
        var $name;
        var $timestamp;
        
        public function __construct($timestamp, $name)
        {
            $this->name = $name;
            $this->timestamp = $timestamp;
        }
        
        public function getName()
        {
            return $this->name;
        }
        
        public function getDate()
        {
            return $this->timestamp;
        }
    }
?>
