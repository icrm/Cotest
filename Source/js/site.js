// Sectional slider
window.addEvent('domready', function(){

    var szSmall = 50, szFull = 500;
    var sectional = $$("#sectional .section");
    var fx = new Fx.Elements(sectional, {
        wait: false, 
        duration: 300, 
        transition: Fx.Transitions.Expo.easeInOut
        });

    sectional.each(function(section, i) {
        section.addEvent("click", function(event) {
            var o = {};
            o[i] = {
                width: [section.getStyle("width").toInt(), szFull]
                }
            sectional.each(function(other, j) {
                if(i != j) {
                    var w = other.getStyle("width").toInt();
                    if(w != szSmall) o[j] = {
                        width: [w, szSmall]
                        };
                }
            });
            fx.start(o);
        });
    });
});