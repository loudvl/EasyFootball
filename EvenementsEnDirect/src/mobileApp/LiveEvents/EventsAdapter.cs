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
using Android.Content.Res;
using Android.OS;
using Android.Runtime;
using Android.Support.Design.Widget;
using Android.Text;
using Android.Views;
using Android.Widget;

namespace LiveEvents
{
    /// <summary>
    /// Own Adapter class based on the BaseAdapter class
    /// </summary>
    public class EventsAdapter : BaseAdapter<Event>
    {
        private readonly IList<Event> _items;
        private readonly Context _context;
        private readonly bool _filter;
        /// <summary>
        /// Construct
        /// </summary>
        /// <param name="context">The context of the app</param>
        /// <param name="items">The list of item to display in the ListView</param>
        /// <param name="filter">Filter to know if we display old events or in progress/not started yet events</param>
        public EventsAdapter(Context context, IList<Event> items,bool filter)
        {
            _items = items;
            _context = context;
            _filter = filter;
        }

        public override long GetItemId(int position)
        {
            return position;
        }
        /// <summary>
        /// Getting a view displaying the data of our list from at a specific position
        /// </summary>
        /// <param name="position">The position of the data in our data list to use</param>
        /// <param name="convertView">Old view to use again if not null</param>
        /// <param name="parent">The parent view this view is attached to</param>
        /// <returns></returns>
        public override View GetView(int position, View convertView, ViewGroup parent)
        {
            var item = _items[position];
            var view = convertView;
            TextView columnLabelA = ((Activity)_context).FindViewById<TextView>(Resource.Id.columnLabelA);
            TextView columnLabelB = ((Activity)_context).FindViewById<TextView>(Resource.Id.columnLabelB);
            TextView columnLabelC = ((Activity)_context).FindViewById<TextView>(Resource.Id.columnLabelC);

            if (view == null)
            {
                var inflater = LayoutInflater.FromContext(_context);
                view = inflater.Inflate(Resource.Layout.row, parent, false);
            }
            view.Id = item.Id;
            if (!_filter)
            {
                columnLabelA.Text = "Start";
                columnLabelB.Text = "End";
                columnLabelC.Text = "Title";
                view.FindViewById<TextView>(Resource.Id.columnA).Text = item.StartDateTime.ToString("yyyy-MM-dd HH:mm:ss");
                view.FindViewById<TextView>(Resource.Id.columnB).Text = item.EndDateTime.ToString("yyyy-MM-dd HH:mm:ss");
                view.FindViewById<TextView>(Resource.Id.columnC).Text = item.Title;
            }
            else
            {
                columnLabelA.Text = "Start";
                columnLabelB.Text = "Title";
                columnLabelC.Text = "State";
                view.FindViewById<TextView>(Resource.Id.columnA).Text = item.StartDateTime.ToString("yyyy-MM-dd HH:mm:ss");
                view.FindViewById<TextView>(Resource.Id.columnB).Text = item.Title;
                view.FindViewById<TextView>(Resource.Id.columnC).Text = item.State.ToString();
            }
            view.Click -= View_Click;
            view.Click += View_Click;

            return view;
        }

        private void View_Click(object sender, EventArgs e)
        {
            LinearLayout myLayout = (LinearLayout)sender;
            Intent myIntent = new Intent(_context, typeof(EventDetails));
            myIntent.PutExtra("eventId", myLayout.Id);
            _context.StartActivity(myIntent);
        }

        /// <summary>
        /// Count the number of items in our data list
        /// </summary>
        public override int Count
        {
            get { return _items.Count; }
        }
        /// <summary>
        /// Return the item of a specific position in the data list
        /// </summary>
        /// <param name="position"></param>
        /// <returns></returns>
        public override Event this[int position]
        {
            get { return _items[position]; }
        }
    }
}