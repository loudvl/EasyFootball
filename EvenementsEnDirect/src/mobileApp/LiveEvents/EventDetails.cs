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
using Newtonsoft.Json;

namespace LiveEvents
{
    [Activity(Label = "EventDetails")]
    public class EventDetails : Activity
    {
        Event anEvent;
        int eventId;
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            SetContentView(Resource.Layout.EventDetails);
            FindViewById<Button>(Resource.Id.backBtn).Click += BackBtn_Click;
            eventId = Intent.GetIntExtra("eventId",-1);
            if(eventId < 0)
            {
                Finish();
            }
            displayEventInfos();
        }

        private void displayEventInfos()
        {
            anEvent = JsonConvert.DeserializeObject<Event>(APIConnector.getData("http://10.0.2.2/scripts/getEvent.php?eventId=" + eventId.ToString()));
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
        }
        private void BackBtn_Click(object sender, EventArgs e)
        {
            Finish();
        }
    }
}