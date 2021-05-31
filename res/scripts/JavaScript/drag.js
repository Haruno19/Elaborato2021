dragElement(document.getElementById("window"),document.getElementById("cont"),document.getElementById("nav"));

function dragElement(elmnt,cont,nav) 
{
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    cont.style.left="10";   //do al contenitore i giusti margini
    cont.style.right="10";
    if (document.getElementById("windowheader")) 
    {
        // if present, the header is where you move the DIV from:
        document.getElementById("windowheader").onmousedown = dragMouseDown; 

        elmnt.style.left=document.body.clientWidth/2-elmnt.clientWidth/2;
        elmnt.style.top="23%";
    }

    function dragMouseDown(e) 
    {
        
        e = e || window.event;
        e.preventDefault();
        // get the mouse cursor position at startup:
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        // call a function whenever the cursor moves:
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) 
    {
        e = e || window.event;
        e.preventDefault();
        // calculate the new cursor position:
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        // set the element's new position:
        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";

        if(parseInt(elmnt.style.left)-10<parseInt(cont.style.left)) //se la left di elmnt < di lcont
            elmnt.style.left=cont.style.left;
        if(elmnt.offsetLeft>cont.offsetLeft+cont.clientWidth-20-elmnt.clientWidth)  //se left di elmnt > lcont+wcont-20-welmtn (sfonda destra)
            elmnt.style.left=cont.offsetLeft+cont.clientWidth-20-elmnt.clientWidth; 
        if(elmnt.offsetTop<cont.offsetTop+nav.clientHeight+30)   //se top elmtn < tcont + 60% hcont (sfonda sopra)
            elmnt.style.top=cont.offsetTop+nav.clientHeight+30
        if(elmnt.offsetTop>cont.offsetTop+cont.clientHeight-20-elmnt.clientHeight)  //se top elmtn > tcont+hcont -20-helmnt
            elmnt.style.top=cont.offsetTop+cont.clientHeight-20-elmnt.clientHeight;
    }

    function closeDragElement() 
    {
        // stop moving when mouse button is released:
        document.onmouseup = null;
        document.onmousemove = null;
    }
}