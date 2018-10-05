$(document).ready(function() {

            $("#aDeletEvent").click(function() {
                $('#modalDelete').modal('show');
            });

            $('#btnConfirmDelete').click(function() {
                var eventId = $('#editEvent1').val();
                $.ajax({
                    url: '/tactic/editEvent.php',
                    type: "GET",
                    dataType: 'JSON',
                    data: {
                        ajaxid: eventId
                    },
                    success: function(data) {

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    }
                });



                // $('#editEvent1').on("change", function () {
                //     var eventId = $('#editEvent1').val();
                //     $.ajax({
                //         url: '/tactic/editEvent.php',
                //         type: "GET",
                //         dataType: 'JSON',
                //         data: {
                //             ajaxid: eventId
                //         },
                //         success: function (data) {
                //             $("#eventName").val(data[0].nameEvent);
                //             $("#organizer").val(data[0].organizationnameEvent);
                //             $("#maxAttendee").val(data[0].maxNumOfAttendee)
                //             $("#sdaytime").val(data[0].sartDateEvent)
                //             $("#edaytime").val(data[0].endDateEvent)
                //             $("#location").val(data[0].locationEvent)
                //             $("#description").val(data[0].descrptionEvent)



                //         },
                //         error: function (xhr, ajaxOptions, thrownError) {
                //             alert(xhr.status);
                //             alert(thrownError);
                //         }
                //     });

            });