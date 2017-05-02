<style>
    #myClock{
        padding:5px;
        color: #ffffff;
        text-align:center;
    }
    #myClock span{
        font:normal 15px 'b nazanin',cursive;
        padding:10px;
    }
    #blink{
        animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
        50% { opacity: 0.0; }
    }

</style>
<time id="myClock" datetime="">
    <div style="width: 30px;" class="pull-right"><span id="second"></span></div>
    <div style="width: 30px;" class="pull-right"><span id="blink">:</span></div>
    <div style="width: 30px;" class="pull-right"><span id="minute"></span></div>
    <div style="width: 30px;" class="pull-right"><span>:</span></div>
    <div style="width: 30px;" class="pull-right"><span id="hour"></span></div>
</time>
<script>
    //get elements
    function getElem(id){
        return document.getElementById(id);
    }
    //attach 0 to under 10 digits
    function digitConfig(digit){
        if(digit<10){
            return '0'+digit;
        }
        return digit;
    }
    //produce time and add it into clock
    function beginClock(){
//create date obj
        var date=new Date();
//covert to jalali
//var JalaliDate=gregorianToJalali(date.getFullYear(),date.getMonth(),date.getDate());
        var hourElem=getElem('hour');
        var minuteElem=getElem('minute');
        var secondElem=getElem('second');
        var myClock=getElem('myClock');
        myClock.setAttribute('datetime',date.toUTCString());
        hourElem.innerHTML=digitConfig(date.getHours());
        minuteElem.innerHTML=digitConfig(date.getMinutes());
        secondElem.innerHTML=digitConfig(date.getSeconds());
    }
    //start clock
    beginClock();
    setInterval('beginClock()',500);
</script>
