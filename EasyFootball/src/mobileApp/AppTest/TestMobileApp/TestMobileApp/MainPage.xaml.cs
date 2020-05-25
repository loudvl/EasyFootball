using Jose;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;

namespace TestMobileApp
{
    [DesignTimeVisible(false)]
    public partial class MainPage : ContentPage
    {
        public IList<Match> matchs { get; private set; }
        public MainPage()
        {
            InitializeComponent();
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        public Task<string> GetAllMatchs()
        {
            try
            {
                HttpWebRequest myRequest = (HttpWebRequest)WebRequest.Create(new Uri("http://10.0.2.2/scripts/getMatchs.php"));
                myRequest.Method = "GET";
                myRequest.ContentType = "application/x-www-form-urlencoded";
                HttpWebResponse response = (HttpWebResponse)myRequest.GetResponse();
                StreamReader reader = new StreamReader(response.GetResponseStream());
                return reader.ReadToEndAsync();
            }
            catch (Exception e)
            {
                throw e;
            }
        }
        /// <summary>
        /// 
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void Button_Clicked(object sender, EventArgs e)
        {
            matchs = new List<Match>();
            matchs = JsonConvert.DeserializeObject<List<Match>>(DecodeJWT(GetAllMatchs().Result));
            BindingContext = this;
        }

        private string DecodeJWT(string token)
        {
            string result = "";
            var secretKey = "Super";
            byte[] bytesKey = Encoding.ASCII.GetBytes(secretKey);
            try
            {
                result = JWT.Decode(token, bytesKey);       
            }
            catch (Exception e)
            {
                Debug.WriteLine("Invalid token! : " + e);
                return null;
            }
            return result;
        }
    }
}
