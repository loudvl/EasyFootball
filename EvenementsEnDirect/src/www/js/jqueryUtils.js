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
/**
 * Generate and display the isVisible checkbox
 * @param {boolean} isChecked 
 */
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
        var component = "<div class=\'row\' id=\'showEventDiv\'><div class=\'col-md-2\'><h5><b>Show Event :<\/h5><\/div><div class=\'col-md-1\'><input class=\'form-control' type=\'checkbox\' onclick=\'updateEventVisibility()\' id=\'showEventBox\' " + checkedString + "><\/div><\/div>";
        if($("#showEventDiv").length <= 0)
        {
                $("#rightInfosCol").append(component);
        }
}

/**
 * This function is called when the start event button is clicked
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
 * This function is called when the stop event button is clicked
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
/**
 * Call the getEventEnd.php script to return the event end date and time
 */
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
/**
 * Call the updateEventVisiblity.php script to set the event isVisible state to the checkbox value
 */
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
/**
 * Call the addMessageToEvent.php script to add a message to the database
 */
function sendMessage() {
        var id = $('#eventId').text();
        var msg = $('#messageBox').val();
        $.ajax({
                type: "POST",
                url: "../scripts/addMessageToEvent.php",
                data: { text: msg, eventId: id },
                success: function (data) {
                        $('#messageBox').val("");
                        displayMessages();
                }
        });
}
/**
 * Call the getManagePageMessages.php script to return a javascript object with the messages in it
 */
function loadMessages() {
        var id = $('#eventId').text();
        return $.ajax({
                type: 'GET',
                url: '../scripts/getManagePageMessages.php',
                async: false,
                dataType: 'json',
                data: { eventId: id },
                done: function (results) {
                        return JSON.parse(results);
                }
        }).responseJSON;
}
/**
 * Display the the current managed event messages
 */
function displayMessages()
{
        var result = loadMessages();
        var resultString = "";
        for(var i = 0;i < result.length;i++)
        {
                resultString += "<tr class='displayMsgRow'><td class='messageTd col-sm-2'><b>"+result[i]["postingDate"]+" |</b></td> <td class='messageTd  col-sm-10'><b style='color:blue'>"+result[i]["text"]+"</b></td></tr>";
        }
        $("#msgList").html(resultString);
}