/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;
using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using Jose;

namespace LiveEvents
{
    /// <summary>
    /// This class gives access to data manipulation functions
    /// </summary>
    public static class APIConnector
    {
        /// <summary>
        /// Call a script page from a server to get the response data
        /// </summary>
        /// <param name="scriptURL">The URL of the script to call</param>
        /// <returns>String</returns>
        public static string getData(string scriptURL)
        {
            try
            {
                HttpWebRequest myRequest = (HttpWebRequest)WebRequest.Create(new Uri(scriptURL));
                myRequest.Method = "GET";
                myRequest.ContentType = "application/x-www-form-urlencoded";
                HttpWebResponse response = (HttpWebResponse)myRequest.GetResponse();
                StreamReader reader = new StreamReader(response.GetResponseStream());
                return DecodeJWT(reader.ReadToEndAsync().Result);
            }
            catch (Exception e)
            {
                throw e;
            }
        }
        /// <summary>
        /// Decode the JWT format string 
        /// </summary>
        /// <param name="token">The encoded string token in JWT format</param>
        /// <returns>String</returns>
        private static string DecodeJWT(string token)
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
                return null;
            }
            return result;
        }
    }
}