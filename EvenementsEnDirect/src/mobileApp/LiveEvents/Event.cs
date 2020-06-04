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
        public int Id { get; }
        public string Title { get; }
        public string Description { get; }
        public string State { get; }
        public string Country { get; }
        public DateTime StartDateTime { get; }
        public DateTime EndDateTime { get; }

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
        public Event(int id, string title, string description, string startDateTime,string endDateTime,string state,int isVisible,string country,Message[] messages)
        {
            Id = id;
            Title = title;
            Description = description;
            State = state;
            Country = country;
            StartDateTime = DateTime.Parse(startDateTime);
        }

    }
}