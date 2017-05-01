$(document).ready(function() {
    $('#info-box').hide(); // Die Infobox ausblenden!
    $(".delete-icon").click(function () {
        if (confirm("Wollen Sie das Projekt wirklich löschen?")) {
            console.log("Löschen true: " + this.id); //this ist das <span>-Element, da an dieses das Click-Event gebunden wurde!
            //Kommunikation mit dem Server aufnehmen, um ihm mitzuteilen,
            //dass das Projekt mit der ID "id" zu löschen ist
            var id = $(this).parent().parent().parent().attr("id");
            var myAJAXConf = {
                url: "http://localhost/medt/ue10/trackstar.php",
                method: "POST",
                data: "deleteProId=" + id,
                //data: "deleteProId=" + $(this).parent().attr("id"), //vom Typ String
                //data: {deleteProId: this.id} //vom Typ Object
                success: function (serverResponse) {
                    console.log("Server response: " + serverResponse);
                    if (serverResponse==1) {
                        //Tabellenzeile entfernen und Infobox
                        //"Löschen erfolgreich" einblenden!
                        $('#info-box').text("Löschen erfolgreich").removeClass("bg-danger").addClass("bg-success").show().fadeOut(4000);
                        $("#"+id).remove();
                    }
                    else {
                        //Infobox "Löschen nicht erfolgreich" einblenden!
                        $('#info-box').text("Löschen fehlgeschlagen").removeClass("bg-success").addClass("bg-danger").show().fadeOut(4000);
                    }
                },
                error: function () {

                }
            };
            $.ajax(myAJAXConf);//AJAX-Request mit dem Konfigurationsobjekt absetzen!

        }
        else {
            console.log("Löschen false" + $(this).attr("id")); // $(this) erzeugt aus dert this-Referenz ein jQuery-Object.
                                                               // Jetzt können alle jQuery-Methoden genutzt werden!
        }
    });
})

