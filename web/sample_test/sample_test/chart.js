jQuery(document).ready(function(){
    var max_value = 0;
    var values_count = 0;
    var chart_height = 200;
    //var bar_width = 50;
    
    jQuery('#chart .value').each(function (index, value) {
        var new_value = parseInt(jQuery(this).attr('value'));
        if (new_value > max_value) {
            max_value = new_value;
        }
        values_count ++;
    });
    
    var i = 0;
    //assuming that we will put 1% gap on the rigth side of each bar except the last one and 0.1% padding on both sides, then calculate their width in % using value_count
    var bar_width=(((100-values_count+1)/values_count)-(0.002*values_count)).toFixed(2);
    jQuery('#chart .value').each(function (index, value) {
      var new_value = parseInt(jQuery(this).attr('value'));
      var timestamp = jQuery(this).attr('timestamp');
      //if bright red is rgb(254,0, 0) then 4 standard deviation will be rgb(248,0,0)
      jQuery(this).css({height: ((new_value / max_value) * chart_height) + 'px', width: bar_width + '%',}).css('left', i * (bar_width) + i + '%').css({ 'background': '-moz-linear-gradient(center top,rgb(248,0,0) 0%,rgb(0,0,0) 100%)' }).get(0).innerHTML = new_value;
      i++;
    });
});
