<?php
#
# PNP template for nagiostats output
#
# (c) Matthias Flacke, June 25th 2009
#
# put this template into PNPDIR/templates
#
$opt[1]  = "--vertical-label \"Time in ms\" -l0 --title \"Host and Service Latency in ms - $hostname\" ";
$def[1]  = "DEF:var9=$rrdfile:$DS[9]:AVERAGE " ;
$def[1] .= "DEF:var10=$rrdfile:$DS[10]:AVERAGE " ;
$def[1] .= "DEF:var11=$rrdfile:$DS[11]:AVERAGE " ;
$def[1] .= "DEF:var12=$rrdfile:$DS[12]:AVERAGE " ;
 
$def[1] .= "AREA:var11#FFCC00:\"Service latency  \" " ;
$def[1] .= "GPRINT:var11:LAST:\"%6.0lf ms last\" " ;
$def[1] .= "GPRINT:var11:AVERAGE:\"%6.0lf ms avg\" " ;
$def[1] .= "GPRINT:var11:MAX:\"%6.0lf ms max\" " ;
$def[1] .= "GPRINT:var11:MIN:\"%6.0lf ms min\\n\" " ;
 
$def[1] .= "LINE:var12#FF0000:\"Service exec time\" " ;
$def[1] .= "GPRINT:var12:LAST:\"%6.0lf ms last\" " ;
$def[1] .= "GPRINT:var12:AVERAGE:\"%6.0lf ms avg\" " ;
$def[1] .= "GPRINT:var12:MAX:\"%6.0lf ms max\" " ;
$def[1] .= "GPRINT:var12:MIN:\"%6.0lf ms min\\n\" " ;
 
$def[1] .= "AREA:var9#5555FF:\"Host latency     \" " ;
$def[1] .= "GPRINT:var9:LAST:\"%6.0lf ms last\" " ;
$def[1] .= "GPRINT:var9:AVERAGE:\"%6.0lf ms avg\" " ;
$def[1] .= "GPRINT:var9:MAX:\"%6.0lf ms max\" " ;
$def[1] .= "GPRINT:var9:MIN:\"%6.0lf ms min\\n\" " ;
 
$def[1] .= "LINE:var10#000000:\"Host exec time   \" " ;
$def[1] .= "GPRINT:var10:LAST:\"%6.0lf ms last\" " ;
$def[1] .= "GPRINT:var10:AVERAGE:\"%6.0lf ms avg\" " ;
$def[1] .= "GPRINT:var10:MAX:\"%6.0lf ms max\" " ;
$def[1] .= "GPRINT:var10:MIN:\"%6.0lf ms min\\n\" " ;
 
 
$opt[2]  = "--vertical-label \"Checks\" -l0 --title \"Service checks during last 5 minutes - $hostname\" ";
$def[2]  = "DEF:var5=$rrdfile:$DS[7]:AVERAGE " ;
$def[2] .= "DEF:var6=$rrdfile:$DS[8]:AVERAGE " ;
$def[2] .= "DEF:var7=$rrdfile:$DS[6]:AVERAGE " ;
$def[2] .= "DEF:var8=$rrdfile:$DS[5]:AVERAGE " ;
 
$def[2] .= "AREA:var5#FF9900:\"Scheduled checks\":STACK " ;
$def[2] .= "GPRINT:var5:LAST:\"%6.0lf last\" " ;
$def[2] .= "GPRINT:var5:AVERAGE:\"%6.0lf avg\" " ;
$def[2] .= "GPRINT:var5:MAX:\"%6.0lf max\" " ;
$def[2] .= "GPRINT:var5:MIN:\"%6.0lf min\\n\" " ;
 
$def[2] .= "AREA:var6#FFCC00:\"Ondemand checks \":STACK " ;
$def[2] .= "GPRINT:var6:LAST:\"%6.0lf last\" " ;
$def[2] .= "GPRINT:var6:AVERAGE:\"%6.0lf avg\" " ;
$def[2] .= "GPRINT:var6:MAX:\"%6.0lf max\" " ;
$def[2] .= "GPRINT:var6:MIN:\"%6.0lf min\\n\" " ;
 
$def[2] .= "LINE:var7#FF0000:\"All checks      \" " ;
$def[2] .= "GPRINT:var7:LAST:\"%6.0lf last\" " ;
$def[2] .= "GPRINT:var7:AVERAGE:\"%6.0lf avg\" " ;
$def[2] .= "GPRINT:var7:MAX:\"%6.0lf max\" ";
$def[2] .= "GPRINT:var7:MIN:\"%6.0lf min\\n\" " ;
 
$def[2] .= "LINE:var8#000000:\"Services defined\" " ;
$def[2] .= "GPRINT:var8:LAST:\"%6.0lf last\" " ;
$def[2] .= "GPRINT:var8:AVERAGE:\"%6.0lf avg\" " ;
$def[2] .= "GPRINT:var8:MAX:\"%6.0lf max\" ";
$def[2] .= "GPRINT:var8:MIN:\"%6.0lf min\\n\" " ;
 
 
$opt[3]  = "--vertical-label \"Checks\" -l0 --title \"Host checks during last 5 minutes - $hostname\" ";
$def[3]  = "DEF:var1=$rrdfile:$DS[3]:AVERAGE " ;
$def[3] .= "DEF:var2=$rrdfile:$DS[4]:AVERAGE " ;
$def[3] .= "DEF:var3=$rrdfile:$DS[2]:AVERAGE " ;
$def[3] .= "DEF:var4=$rrdfile:$DS[1]:AVERAGE " ;
 
$def[3] .= "AREA:var1#7777FF:\"Scheduled checks\":STACK " ;
$def[3] .= "GPRINT:var1:LAST:\"%6.0lf last\" " ;
$def[3] .= "GPRINT:var1:AVERAGE:\"%6.0lf avg\" " ;
$def[3] .= "GPRINT:var1:MAX:\"%6.0lf max\" " ;
$def[3] .= "GPRINT:var1:MIN:\"%6.0lf min\\n\" " ;
 
$def[3] .= "AREA:var2#BBBBFF:\"Ondemand checks \":STACK " ;
$def[3] .= "GPRINT:var2:LAST:\"%6.0lf last\" " ;
$def[3] .= "GPRINT:var2:AVERAGE:\"%6.0lf avg\" " ;
$def[3] .= "GPRINT:var2:MAX:\"%6.0lf max\" " ;
$def[3] .= "GPRINT:var4:MIN:\"%6.0lf min\\n\" " ;
 
$def[3] .= "LINE:var3#0000FF:\"All checks      \" " ;
$def[3] .= "GPRINT:var3:LAST:\"%6.0lf last\" " ;
$def[3] .= "GPRINT:var3:AVERAGE:\"%6.0lf avg\" " ;
$def[3] .= "GPRINT:var3:MAX:\"%6.0lf max\" ";
$def[3] .= "GPRINT:var3:MIN:\"%6.0lf min\\n\" " ;
 
$def[3] .= "LINE:var4#000000:\"Hosts defined   \" " ;
$def[3] .= "GPRINT:var4:LAST:\"%6.0lf last\" " ;
$def[3] .= "GPRINT:var4:AVERAGE:\"%6.0lf avg\" " ;
$def[3] .= "GPRINT:var4:MAX:\"%6.0lf max\" ";
$def[3] .= "GPRINT:var4:MIN:\"%6.0lf min\\n\" " ;
 
?>
