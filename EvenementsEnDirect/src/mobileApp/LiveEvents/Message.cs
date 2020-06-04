/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
using System;

namespace LiveEvents
{
    /// <summary>
    /// This class contains the informations relative to a message
    /// </summary>
    public class Message
    {
        public string Text { get; }
        public DateTime PostingDate { get; }
        public int EventId { get; }

        /// <summary>
        /// Constructor
        /// </summary>
        /// <param name="text">The text of the message</param>
        /// <param name="postingDate">The posting date of the message</param>
        /// <param name="eventId">The message owner event id</param>
        public Message(string text,DateTime postingDate,int eventId)
        {
            Text = text;
            PostingDate = postingDate;
            EventId = eventId;
        }

    }
}