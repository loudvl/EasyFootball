//import * as jwtJsDecode from 'jwt-js-decode';
/**
 * Display the managing interface of the page in different case
 * @param {int} currentState 
 */
function displayManageInterface(currentState) {
        switch (currentState) {
                case 0:
                        //var event = JWTDecode(getEvent());
                        //var component = "<div class=\'row\'><div class=\'col-md-12\'><h5><b>End :<\/b><\/h5><p>"+event.endDateTime+"<\/p><\/div><\/div>"
                        $('#messageBox').remove();
                        $('#pushBtn').remove();
                        //$(component).insertAfter($("#startDateTimeRow"));
                        break;
                case 1:
                        $('#messageBox').attr('disabled', false);
                        $('#pushBtn').attr('disabled', false);
                        break;
                case 2:
                        $('#messageBox').attr('disabled', true);
                        $('#pushBtn').attr('disabled', true);
                        break;
        }
        displayManageButton(currentState);
}
/**
 * Display the manage button in different state case
 * @param {int} currentState 
 */
function displayManageButton(currentState) {
        var value;
        var text;
        var onClickAction;
        switch (currentState) {
                case 0:
                        value = "Delete";
                        text = "Delete event";
                        onClickAction = "window.location.href='../scripts/deleteEvent.php?eventId=" + $('#eventId').text() + "'";
                        break;
                case 1:
                        value = "Stop";
                        text = "Stop event";
                        onClickAction = "stopEvent()";
                        break;
                case 2:
                        value = "Start";
                        text = "Start event";
                        onClickAction = "startEvent()";
                        break;
        }
        $('#manageBtn').attr('value', value);
        $('#manageBtn').attr('onclick', onClickAction);
        $('#manageBtn').text(text);
}
/**
 * This is the function called when the start event button is clicked
 */
function startEvent() {
        var id = $('#eventId').text();
        $.ajax({
                type: "POST",
                url: "../scripts/updateEventState.php",
                data: { eventId: id, eventState: 1 },
                success: function (data) {
                        displayManageInterface(1)
                }
        });
}
/**
 * This is the function called when the stop event button is clicked
 */
function stopEvent() {
        var id = $('#eventId').text();
        $.ajax({
                type: "POST",
                url: "../scripts/updateEventState.php",
                data: { eventId: id, eventState: 0 },
                success: function (data) {
                        displayManageInterface(0)
                }
        });
}

function getEvent() {
        var id = $('#eventId').text();
        $.ajax({
                type: "POST",
                url: "../scripts/getEvent.php?eventId="+id,
                data: { eventId: id, eventState: 0 },
                success: function (data) {
                        return data;
                }
        });
}

function JWTDecode(jwtoken)
{
        jwtVerify(jwtoken, 'Super').then(res => {
                if (res === true) {
                    const jwt = jwtDecode(jwtoken);
                    return jwt.payload;
                }
            });
}