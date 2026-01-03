- just add this code in PHP file
<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
 </script>
 
 
 OR 
 
https://www.c-sharpcorner.com/blogs/disable-browser-back-button-using-javascript1
<script type = "text/javascript" >  
function preventBack() { window.history.forward(); }  
setTimeout("preventBack()", 0);  
window.onunload = function () { null };  
</script> 