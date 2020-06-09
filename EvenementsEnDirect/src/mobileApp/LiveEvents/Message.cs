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
        /// <summary>
        /// The text of the message
        /// </summary>
        public string Text { get; }
        /// <summary>
        /// The posting date and time of the message
        /// </summary>
        public DateTime PostingDate { get; }
        /// <summary>
        /// The id of the event this message belongs too
        /// </summary>
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