<?php
//session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
   var emprole=$("#pfc_role").val();
   console.log(emprole);
   if(emprole==2)
   {
        $(".empdetal1").hide();
        $(".empdetal2").show();
        $(".sysconfig").hide();
        $(".attendance1").hide();
        $(".offermgmt1").hide();
        $("#editbutton").hide();
        $("#delbutton").hide();
   }

   if(emprole==1)
   {
        $(".empdetal1").show();
        $(".empdetal2").show();
        $(".sysconfig").show();
        $(".offermgmt1").show();
        $(".projectmgmt1").show();
        $(".product1").show();
        $(".earthing1").show();
        $(".attendance1").show();
        $(".ticketingsystem").show();

        $("#editbutton").show();
        $("#delbutton").show();
   }

   if(emprole==3)
   {
        $(".empdetal1").show();
        $(".empdetal2").show();
        $(".sysconfig").hide();
        $(".offermgmt1").hide();
        $(".projectmgmt1").hide();
        $(".earthing1").hide();
        $(".attendance1").hide();
        $(".ticketingsystem").hide();
   }
   if(emprole==4)
   {
        $(".empdetal1").show();
        $(".addemployee").show();
        
        $(".empdetal2").hide();
        $(".empdetal2").css("display", "none");

        $(".sysconfig").hide();
        $(".sysconfig").css("display", "none");

        $(".offermgmt1").show();
        
        $(".projectmgmt1").hide();
        $(".projectmgmt1").css("display", "none");

        $(".earthing1").hide();
        $(".earthing1").css("display", "none");

        $(".attendance1").show();
        
        $(".ticketingsystem").hide();
        $(".ticketingsystem").css("display", "none");
   }

  
   });
</script>
</head>
<body>

<form>
    <input type="hidden" name="pfc_role" id="pfc_role" value="<?php echo $_SESSION['PFC_EmpRole'];?>">
</form>

</body>
</html>