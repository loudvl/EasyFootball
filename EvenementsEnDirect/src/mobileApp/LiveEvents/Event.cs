/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
using System;
using System.Collections.Generic;
using System.Runtime.Remoting.Messaging;

namespace LiveEvents
{
    /// <summary>
    /// This class contains the informations of an event
    /// </summary>
    public class Event
    {
        /// <summary>
        /// The id of the event
        /// </summary>
        public int Id { get; }
        /// <summary>
        /// The title of the event
        /// </summary>
        public string Title { get; }
        /// <summary>
        /// The description of the event
        /// </summary>
        public string Description { get; }
        /// <summary>
        /// The state of the event
        /// </summary>
        public string State { get; }
        /// <summary>
        /// The country of the event
        /// </summary>
        public string Country { get; }
        /// <summary>
        /// The start date and time of the event
        /// </summary>
        public DateTime StartDateTime { get; }
        /// <summary>
        /// The end date and time of the event
        /// </summary>
        public DateTime EndDateTime { get; }
        /// <summary>
        /// The messages of the event
        /// </summary>
        public List<Message> Messages { get; set; }

        /// <summary>
        /// Constructor
        /// </summary>
        /// <param name="id">The id of the event</param>
        /// <param name="title">The title of the event</param>
        /// <param name="description">The description of the event</param>
        /// <param name="startDateTime">The starting datetime of the event</param>
        /// <param name="endDateTime">The ending datetime of the event</param>
        /// <param name="state">The state of the event</param>
        /// <param name="isVisible">Is the event visible</param>
        /// <param name="country">The country of the event</param>
        /// <param name="messages">The messages of the event</param>
        public Event(int id, string title, string description, string startDateTime, string endDateTime, string state,int isVisible,string country,Message[] messages)
        {
            Id = id;
            Title = title;
            Description = description;
            State = state;
            Country = country;
            StartDateTime = DateTime.Parse(startDateTime);
            if (endDateTime != null)
            {
                EndDateTime = DateTime.Parse(endDateTime);
            }
            Messages = new List<Message>();
        }

    }
}