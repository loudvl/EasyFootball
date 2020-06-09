/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using Java.Util;
using Newtonsoft.Json;

namespace LiveEvents
{
    [Activity(Label = "EventDetails")]

    /// <summary>
    /// This class contains function that are used in the EventDetails screen of the app
    /// </summary>
    public class EventDetails : Activity
    {
        /// <summary>
        /// The event that this screen display
        /// </summary>
        Event anEvent;
        /// <summary>
        /// The id of the event that this screen display
        /// </summary>
        int eventId;
        /// <summary>
        /// The timer that check for new message
        /// </summary>
        System.Timers.Timer timer;
        /// <summary>
        /// The ListView that contains the messages of the event
        /// </summary>
        ListView list;
        /// <summary>
        /// The adapter that create the View for the messages and assign the messages values to it 
        /// </summary>
        MessagesAdapter messagesAdapter;
        /// <summary>
        /// OnCreate is called when the system creates this new activity
        /// </summary>
        /// <param name="savedInstanceState">The previous activity saved state</param>
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            SetContentView(Resource.Layout.EventDetails);
            list = FindViewById<ListView>(Resource.Id.messagesList);
            FindViewById<Button>(Resource.Id.backBtn).Click += BackBtn_Click;
            eventId = Intent.GetIntExtra("eventId",-1);
            if(eventId < 0)
            {
                Finish();
            }
            anEvent = JsonConvert.DeserializeObject<Event>(APIConnector.getData("http://10.0.2.2/scripts/getEvent.php?eventId=" + eventId.ToString()));
            
            messagesAdapter = new MessagesAdapter(this, anEvent.Messages);
            messagesAdapter.NotifyDataSetChanged();
            list.Adapter = messagesAdapter;
            timer = new System.Timers.Timer();
            timer.Enabled = true;
            timer.Interval = 5000;
            timer.Elapsed += Timer_Elapsed;
            timer.AutoReset = true;
            displayEventInfos();
            timer.Start();
        }
        /// <summary>
        /// Timer callback
        /// </summary>
        /// <param name="sender">The object who called this method</param>
        /// <param name="e">Contains meta informations about the event</param>
        private void Timer_Elapsed(object sender, System.Timers.ElapsedEventArgs e)
        {
            Console.WriteLine("Timer elapsed before load: anEvent.Message.Count: {0}", anEvent.Messages.Count);
            loadMessages();
            Console.WriteLine("Timer elapsed after load: anEvent.Message.Count: {0}", anEvent.Messages.Count);
        }
        /// <summary>
        /// Display the event infos
        /// </summary>
        private void displayEventInfos()
        {
            FindViewById<TextView>(Resource.Id.titleLabel).Text = anEvent.Title;
            FindViewById<TextView>(Resource.Id.descriptionTextLabel).Text = anEvent.Description;
            FindViewById<TextView>(Resource.Id.countryLabel).Text = "Country : " + anEvent.Country;
            FindViewById<TextView>(Resource.Id.startDateTimeTextLabel).Text = anEvent.StartDateTime.ToString("yyyy-MM-dd HH:mm:ss");
            if (anEvent.State != "Past")
            {
                FindViewById<TextView>(Resource.Id.endDateTimeTextLabel).Visibility = ViewStates.Invisible;
                FindViewById<TextView>(Resource.Id.endDateTimeLabel).Visibility = ViewStates.Invisible;
            }
            else
            {
                FindViewById<TextView>(Resource.Id.endDateTimeTextLabel).Text = anEvent.EndDateTime.ToString("yyyy-MM-dd HH:mm:ss");
            }

            if(anEvent.State != "Not Started Yet")
            {
                loadMessages();
            }
        }

        /// <summary>
        /// Load the messages of the event from database
        /// </summary>
        private void loadMessages()
        {
            Console.WriteLine("Load message before clear: anEvent.Message.Count: {0}", anEvent.Messages.Count);
            List<Message> messages = new List<Message>();
            messages = JsonConvert.DeserializeObject<List<Message>>(APIConnector.getData("http://10.0.2.2/scripts/getMessages.php?eventId=" + eventId.ToString()));
            Console.WriteLine("Load message after clear: anEvent.Message.Count: {0}     messages.Count: {1}", anEvent.Messages.Count, messages.Count);
            if (anEvent.Messages.Count < messages.Count)
            {
                anEvent.Messages.Clear();
                anEvent.Messages.AddRange(messages);
                Console.WriteLine("Load message Après assignement : anEvent.Message.Count: {0}     messages.Count: {1}", anEvent.Messages.Count, messages.Count);
                messagesAdapter.NotifyDataSetChanged();
                list.ScrollTo(0,0);
                FindViewById<LinearLayout>(Resource.Id.baseView).Invalidate();
                FindViewById<LinearLayout>(Resource.Id.baseView).RefreshDrawableState();
            }
        }
        /// <summary>
        /// Return button callback for OnClick
        /// </summary>
        /// <param name="sender">The object that called this method</param>
        /// <param name="e">Contains meta informations about the event</param>
        private void BackBtn_Click(object sender, EventArgs e)
        {
            Finish();
        }
    }
}