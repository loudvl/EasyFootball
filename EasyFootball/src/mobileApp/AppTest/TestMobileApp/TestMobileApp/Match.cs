using System;
using System.Collections.Generic;
using System.Text;
/// <summary>
/// 
/// </summary>

namespace TestMobileApp
{
    /// <summary>
    /// 
    /// </summary>
    public class Match
    {
        private DateTime _startDateTime;
        private string _stadium;
        private int _idTeam1;
        private int _idTeam2;
        private string _team1Score;
        private string _team2Score;
        private string _matchState;
        public DateTime StartDateTime { get => _startDateTime; set => _startDateTime = value; }
        public string Stadium { get => _stadium; set => _stadium = value; }
        public int IdTeam1 { get => _idTeam1; set => _idTeam1 = value; }
        public int IdTeam2 { get => _idTeam2; set => _idTeam2 = value; }
        public string Team1Score { get => _team1Score; set => _team1Score = value; }
        public string Team2Score { get => _team2Score; set => _team2Score = value; }
        public string MatchState { get => _matchState; set => _matchState = value; }

        public Match(DateTime startDateTime, string stadium, string team1Score, string team2Score, string matchState, int idTeam1, int idTeam2)
        {
            _idTeam1 = idTeam1;
            _idTeam2 = idTeam2;
            _startDateTime = startDateTime;
            _stadium = stadium;
            _team1Score = team1Score;
            _team2Score = team2Score;
            _matchState = matchState;
        }
    }
}
