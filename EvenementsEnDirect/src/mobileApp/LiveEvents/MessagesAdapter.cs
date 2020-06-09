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
        /// <summary>
        /// The items to be displayed in the view
        /// </summary>
        public List<Message> _items;
        /// <summary>
        /// The app context
        /// </summary>
        public Activity _context;
        /// <summary>
        /// Construct
        /// </summary>
        /// <param name="context">The context of the app</param>
        /// <param name="items">The list of item to display in the ListView</param>
        public MessagesAdapter(Activity context, List<Message> items) : base()
        {
            _context = context;
            _items = items;
            Console.WriteLine("MessageAdapter after assignement: _items.Count: {0}", _items.Count);
        }
        /// <summary>
        /// Give the itemId from its position
        /// </summary>
        /// <param name="position">The item position in the view</param>
        /// <returns>the position of the item in the view</returns>
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
        /// <returns>Returns the view that just got generated</returns>
        public override View GetView(int position, View convertView, ViewGroup parent)
        {
            Message item = this[position];
            View view = convertView;
            Console.WriteLine("GetView : position: {0} view: {1} parent: {2}", position,view,parent);
            if (view == null)
            {
                view = _context.LayoutInflater.Inflate(Resource.Layout.MessageTemplate, parent, false);
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
        /// <param name="position">the position of the item</param>
        /// <returns>The Message in the data list specified position</returns>
        public override Message this[int position]
        {
            get { return _items[position]; }
        }
    }
}