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
    public class MessagesAdapter : BaseAdapter<Message>
    {
        public IList<Message> _items;
        public Context _context;
        /// <summary>
        /// Construct
        /// </summary>
        /// <param name="context">The context of the app</param>
        /// <param name="items">The list of item to display in the ListView</param>
        public MessagesAdapter(Context context, IList<Message> items)
        {
            _items = items;
            _context = context;
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

            if (view == null)
            {
                var inflater = LayoutInflater.FromContext(_context);
                view = inflater.Inflate(Resource.Layout.MessageTemplate, parent, false);
            }
                view.FindViewById<TextView>(Resource.Id.columnA).Text = item.PostingDate.ToString("yyyy-MM-dd HH:mm:ss");
                view.FindViewById<TextView>(Resource.Id.columnB).Text = item.Text;
            return view;
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
        public override Message this[int position]
        {
            get { return _items[position]; }
        }
    }
}