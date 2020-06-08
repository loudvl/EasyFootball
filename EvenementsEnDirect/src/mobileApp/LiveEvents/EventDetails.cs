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
    public class EventDetails : Activity
    {
        Event anEvent;
        int eventId;
        System.Timers.Timer timer;
        IList<Message> messages = new List<Message>();
        ListView list;
        MessagesAdapter messagesAdapter;
        protected override void OnCreate(Bundle savedInstanceState)
        {
            list = new ListView(this);
            base.OnCreate(savedInstanceState);
            SetContentView(Resource.Layout.EventDetails);
            FindViewById<Button>(Resource.Id.backBtn).Click += BackBtn_Click;
            eventId = Intent.GetIntExtra("eventId",-1);
            if(eventId < 0)
            {
                Finish();
            }
            anEvent = JsonConvert.DeserializeObject<Event>(APIConnector.getData("http://10.0.2.2/scripts/getEvent.php?eventId=" + eventId.ToString()));
            messagesAdapter = new MessagesAdapter(this, anEvent.Messages);
            timer = new System.Timers.Timer();
            timer.Enabled = true;
            timer.Interval = 5000;
            timer.Elapsed += Timer_Elapsed;
            timer.AutoReset = true;
            displayEventInfos();
            timer.Start();
        }

        private void Timer_Elapsed(object sender, System.Timers.ElapsedEventArgs e)
        {
            timer.Stop();
            timer.Dispose();
            loadMessages();
        }

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

        private void loadMessages()
        {
            messages.Clear();
            messages = JsonConvert.DeserializeObject<List<Message>>(APIConnector.getData("http://10.0.2.2/scripts/getMessages.php?eventId=" + eventId.ToString()));
            if(anEvent.Messages.Count < messages.Count)
            {
                anEvent.Messages.Clear();
                anEvent.Messages = messages;
                list = (ListView)FindViewById(Resource.Id.messagesList);
                    messagesAdapter._items.Clear();
                    messagesAdapter._items = anEvent.Messages;
                    messagesAdapter._context = this;
                    messagesAdapter.NotifyDataSetChanged();
                list.Adapter = messagesAdapter;
            }
            timer.Start();
        }
        private void BackBtn_Click(object sender, EventArgs e)
        {
            Finish();
        }
    }
}