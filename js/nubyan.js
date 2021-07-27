 var nav=document.querySelector("#nav");
 
 window.onscroll = function (){
    if(window.pageYOffset > 150){
        this.nav.style.position = "fixed";
        this.nav.style.top = 0;
        this.nav.style.marginBottom = "10px";
        this.nav.style.marginLeft = "auto";
        this.nav.style.marginRight = "auto";
        this.nav.style.zIndex = "2";
    }
    else{
        this.nav.style.position = "absolute";
        this.nav.style.top = 150;
        this.nav.style.marginLeft = "auto";
        this.nav.style.marginRight = "auto";
    }
}    
