/**
 * Display the managing interface of the page in different case
 * @param {int} currentState 
 */
function displayManageInterface(currentState, isVisible) {
        switch (currentState) {
                case 0:
                        var eventEndDateTime = getEventEndDateTime();
                        var component = "<div class=\'row\'><div class=\'col-md-12\'><h5><b>End :<\/b><\/h5><p>" + eventEndDateTime + "<\/p><\/div><\/div>"
                        $('#messageBox').remove();
                        $('#pushBtn').remove();
                        $(component).insertAfter($("#startDateTimeRow"));
                        displayVisibilityCheckbox(isVisible);
                        break;
                case 1:
                        $('#messageBox').attr('disabled', false);
                        $('#pushBtn').attr('disabled', false);
                        displayVisibilityCheckbox(isVisible);
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

function displayVisibilityCheckbox(isChecked) {
        var checkedString;
        switch (isChecked) {
                case 1:
                        checkedString = "checked";
                        break;
                case 0:
                        checkedString = " ";
                        break;
        }
        var component = "<div class=\'row\'><div class=\'col-md-2\'><h5><b>Show Event :<\/h5><\/div><div class=\'col-md-1\'><input class=\'form-control' type=\'checkbox\' onclick=\'updateEventVisibility()\' id=\'showEventBox\' " + checkedString + "><\/div><\/div>";
        $("#rightInfosCol").append(component);
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

function getEventEndDateTime() {
        var id = $('#eventId').text();
        return $.ajax({
                type: 'POST',
                url: '../scripts/getEventEnd.php',
                async: false,
                dataType: 'json',
                data: { eventId: id },
                done: function (results) {
                        return results;
                }
        }).responseJSON;
}

function updateEventVisibility() {
        var id = $('#eventId').text();
        var isChecked = $("#showEventBox").is(":checked") === false ? 0 : 1;
        $.ajax({
                type: "POST",
                url: "../scripts/updateEventVisibility.php",
                data: { eventId: id, isVisible: isChecked },
                success: function (data) {
                }
        });
}

function sendMessage() {
        var id = $('#eventId').text();
        var msg = $('#messageBox').val();
        $.ajax({
                type: "POST",
                url: "../scripts/addMessageToEvent.php",
                data: { text: msg, eventId: id },
                success: function (data) {
                        $('#messageBox').val("");
                }
        });
}
