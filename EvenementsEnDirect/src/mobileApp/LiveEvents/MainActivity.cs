/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/

using Android.App;
using Android.OS;
using Android.Support.V7.App;
using Android.Runtime;
using Android.Widget;
using System.Collections.Generic;
using Newtonsoft.Json;
using System;
using System.Collections;

namespace LiveEvents
{
    [Activity(Label = "@string/app_name", Theme = "@style/AppTheme", MainLauncher = true)]
    public class MainActivity : Activity
    {
        RadioGroup eventTypeSelection;
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            Xamarin.Essentials.Platform.Init(this, savedInstanceState);
            // Set our view from the "main" layout resource
            SetContentView(Resource.Layout.list_item);
            eventTypeSelection = FindViewById<RadioGroup>(Resource.Id.radioGroup);
            eventTypeSelection.CheckedChange += onCheckedChanged;

        }
        /// <summary>
        /// The RadioGroup callback for OnCheckedChanged event
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void onCheckedChanged (object sender,RadioGroup.CheckedChangeEventArgs e)
        {
            switch (e.CheckedId)
            {
                case Resource.Id.radioButton1:
                    loadList("http://10.0.2.2/scripts/getAllVisibleEvents.php?filter=false",false);
                    break;
                case Resource.Id.radioButton2:
                    loadList("http://10.0.2.2/scripts/getAllVisibleEvents.php?filter=true",true);
                    break;
            }
        }
        /// <summary>
        /// Loads the event List and display it
        /// </summary>
        /// <param name="scriptPath">The script URL to call</param>
        /// <param name="filter">To filter if we want past events or in progress/not started yet events</param>
        public void loadList(string scriptPath,bool filter)
        {
            IList<Event> events = JsonConvert.DeserializeObject<List<Event>>(APIConnector.getData(scriptPath));

            ListView list = (ListView)FindViewById(Resource.Id.mainList);
            MyAdapter mSchedule = new MyAdapter(this, events,filter);
            list.Adapter = mSchedule;
        }
        public override void OnRequestPermissionsResult(int requestCode, string[] permissions, [GeneratedEnum] Android.Content.PM.Permission[] grantResults)
        {
            Xamarin.Essentials.Platform.OnRequestPermissionsResult(requestCode, permissions, grantResults);

            base.OnRequestPermissionsResult(requestCode, permissions, grantResults);
        }
    }
}