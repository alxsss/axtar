<?
    /**
     * utilizatori actions.
     *
     * @package    sfCalendarPlugin
     * @subpackage sfCalendarPluginAjax
     * @author     Dan Harabagiu
     * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
     */
    class sfCalendarPluginActions extends sfActions
    {
        public function executeIndex(sfWebRequest $request)
        {
            $month = $request->getParameter('sfCalendarMonth',0);
            $year = $request->getParameter('sfCalendarYear',0);
            
            if($month == 0 || $year == 0)
            {
                $month = date("m");
                $year = date("Y");
                $now = mktime(0,0,0,$month,1,$year);
            }
            else
            {
                $now = mktime(0,0,0,$month,1,$year);
            }
            
            $this->today = date("Y-m-d");
            $this->month_name = date("F",$now);
            $this->max_days = date("t",$now);
            $this->month = $month;
            $this->year = $year;
            $this->first_day = date("N",$now);
            
            if($month == 1)
            {
                $this->pmonth = 12;
                $this->pyear = $year - 1;
                $this->nmonth = $month + 1;
                $this->nyear = $year;
            }
            elseif($month == 12)
            {
                $this->pmonth = $month - 1;
                $this->pyear = $year;
                $this->nmonth = 1;
                $this->nyear = $year + 1;
            }
            else
            {
                $this->pmonth = $month - 1;
                $this->pyear = $year;
                $this->nmonth = $month + 1;
                $this->nyear = $year;
            }
            
            $this->setLayout(false);
            return sfView::SUCCESS;
        }
    }
?>