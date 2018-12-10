function dibujar(){
    var r=document.getElementById("r").value;
    var xc=document.getElementById("xc").value;
    var yc=document.getElementById("yc").value;
    var contexto = document.getElementById("canvas2D").getContext("2d");
    contexto.fillStyle = "#ff0000";
}

function dibujar1(){
    var xo=document.getElementById("xo").value;
    var yo=document.getElementById("yo").value;
    var xf=document.getElementById("xf").value;
    var yf=document.getElementById("yf").value;
    var contexto = document.getElementById("canvas2D").getContext("2d");
    contexto.fillStyle = "#ff0000";
    var m;
    var xi=0;
    var x=0; var y=0;
    m=(yf-yo)/(xf-xo);
    if(((Math.abs(m)<1)&&(xo>xf))||((Math.abs(m)>1)&&(yo>yf)))
    {
        var b=xf;xf=xo;xo=b;// CAMBIAMOS DE POSICION LOS PUNTOS
        b=yf;yf=yo;yo=b;// FINAL A INICIAL Y VICEVERSA SI ES QUE FUERA NECESARIO
    }
    contexto.fillRect(xo+250,yo+250,1,1);
    if(Math.abs(m)<1)
    {
        var yr=yo;
        for(x=(xo+1);x<=(xf-1);x++)
        {
            yr=yr+m;
            contexto.fillRect(x+250,Math.round(yr)+250,1,1);
        }
    }
    else
    {
        var minversa=1/m;
        xr=xo;
        for(y=(yo+1);y<=(yf-1);y++)
        {
            xr=xr+minversa;
            contexto.fillRect(Math.round(xr)+250,y+250,1,1);
        }
        contexto.fillRect(xf+250,yf+250,1,1);
    }
}

function limpiar(){
    var ctx = document.getElementById("canvas2D").getContext("2d");
    ctx.clearRect(0, 0, 500, 500);
}

function c_incremental(){
    var r=document.getElementById("r").value;
    var xc=document.getElementById("xc").value;
    var yc=document.getElementById("yc").value;
    var contexto = document.getElementById("canvas2D").getContext("2d");
    contexto.fillStyle = "#ff0000";
    var y;
    for (var xi = -r; xi <= r; xi++) {
        y=yc+Math.sqrt(Math.pow(r,2)-Math.pow((xc-xi),2));
        contexto.fillRect(xi+250,Math.round(y)+250,1,1);
        y=yc-Math.sqrt(Math.pow(r,2)-Math.pow((xc-xi),2));
        contexto.fillRect(xi+250,Math.round(y)+250,1,1);
    }
}

function c_implicita(){
    var r=document.getElementById("r").value;
    var xc=document.getElementById("xc").value;
    var yc=document.getElementById("yc").value;
    var contexto = document.getElementById("canvas2D").getContext("2d");
    contexto.fillStyle = "#ff0000";
    var dalfa;var cost;var sent;var x=0;var y=0;var xtemp=0;
    var fi=1;
    dalfa=1/r;
    cost=Math.cos(dalfa);
    sent=Math.sin(dalfa);
    y=r;
    while(y>x)
    {
        contexto.fillRect(Math.round(x)+xc+250,yc+Math.round(y)*fi+250,1,1);
        contexto.fillRect(xc-Math.round(x)+250,yc+Math.round(y)*fi+250,1,1);
        contexto.fillRect(Math.round(x)+xc+250,yc-Math.round(y)*fi+250,1,1);
        contexto.fillRect(xc-Math.round(x)+250,yc-Math.round(y)*fi+250,1,1);
        xtemp=x;
        x=(x*cost-y*sent);
        y=(y*cost+xtemp*sent);
    }
}