var lots = new Array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
           "l", "m", "n", "o");
var lotflags = new Array(false, false, false, false, false, false, false,
               false, false, false, false, false, false, false, false);
var numlots = 15;
var prefslist = ""

function formsubmit()
{
	if (numlots)
	{
		alert("You have not finished making selections.\n" +
		      "Values have NOT been submitted.");
		return;
	}
	if (document.lotform.id.value == "" || document.lotform.password.value == "")
	{
		alert("Please enter ID and PASSWORD before submitting.\n"
		      + "Values have NOT been submitted");
		return;
	}
	var cnf = confirm("Please make sure you made your selections correctly.\n"
	                   + "After you submit, they can not be changed.\n"
	                   + "Are you SURE you want to continue?");
	if (cnf == true)
		document.lotform.submit();
	else
		return;
}


function formreset()
{
        for (i = 0; i < lotflags.length; i++)
        {
                lotflags[i] = false;
        }
        for (i = 1; i <= 15; i ++)
        {
                document.getElementById(i + "b").innerHTML = "";
        }

        document.getElementById('lots').src = "lots.img.php?l=";

        document.lotform.reset();
        prefslist = ""
        numlots = 15;
}

function debug()
{
        var i;
        for (i = 0; i < 15; i++)
                fill(i);
}

function fill(index)
{
	var i;
	
	if (!numlots)
	{
		alert("All selections have been made. \n Please RESET or SUBMIT.");
		return;
	}
	
	if (lotflags[index])
	{
	        var text = "";
	        for (i = 0; i < lots.length; i ++)
	        {
	                if (!lotflags[i])
	                {
	                        text += lots[i];
	                        text += ", ";
	                }
	        }
	        text = text.substring(0,text.length-2);
	        alert("Value has already been selected!\nRemaining values are: "
	               + text);
	
	        return;
	}
	
	prefslist += lots[index]
	
	document.lotform.elements["prefs"].value = prefslist
	
	document.getElementById('lots').src += lots[index] + ',';
	
	// i=2, length-0
	for (i = 1; i <= 15; i++)
	{
	        if (document.getElementById(i.toString() + "b").innerHTML != "")
	        {
	                continue;
	        }
	        else
	        {
	                document.getElementById(i.toString() + "b").innerHTML = lots[index];
	                lotflags[index] = true;
	                numlots--;
	
	                break;
	        }
	}
}
