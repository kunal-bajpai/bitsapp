var xmlhttp,updateObj;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  updateObj=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  updateObj=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.open("GET","ajax/menu.php",false);
xmlhttp.send();
var table=document.getElementById("menu");
var menu=JSON.parse(xmlhttp.responseText);
for(var i=0;i<menu.length;i++)
{
    var row = document.createElement("tr");
    for(var opt in menu[i])
    {
            if(opt=="breakfast" || opt=="lunch" || opt=="snacks" || opt=="dinner")
            {
                var data = document.createElement("td");
                var box = document.createElement("textarea");
                box.readOnly=true;
                box.style.backgroundColor="#e7e7e7";
                box.value=menu[i][opt];
                box.id=menu[i]["ID"];
                box.className=opt;
                box.onkeypress = function (e) {
                        if (e.keyCode === 13)
                            this.blur();
                };
                box.onclick = function() {
                if(this.readOnly)
                    {
                        this.readOnly=false;
                        this.style.backgroundColor="white";
                        this.select();
                        this.oldValue=this.value;
                        this.onblur=function() {
                            this.parentNode.childNodes[0].readOnly=true;
                            this.parentNode.childNodes[0].style.backgroundColor="#e7e7e7";
                            if(this.oldValue!=this.value)
                            {
                                updateObj.open("POST","ajax/updateMenu.php",true);
                                updateObj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                                updateObj.send("id="+this.id+"&"+this.className+"="+this.value);
                            }
                        }
                    }
                }
                data.appendChild(box);
                row.appendChild(data);
            }
            if(opt=="day" || opt=="username")
            {
                var data = document.createElement("td");
                data.innerHTML=menu[i][opt];
                row.appendChild(data);
            }
    }
    table.appendChild(row);
}