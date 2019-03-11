using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Shopstore
{
    #region User_info
    public class User_info
    {
        #region Member Variables
        protected int _user_id;
        protected string _fname;
        protected string _lname;
        protected string _email;
        protected string _password;
        protected string _phone;
        protected string _adress;
        protected string _adress;
        protected string _Userlevel;
        protected unknown _born;
        protected string _gender;
        #endregion
        #region Constructors
        public User_info() { }
        public User_info(string fname, string lname, string email, string password, string phone, string adress, string adress, string Userlevel, unknown born, string gender)
        {
            this._fname=fname;
            this._lname=lname;
            this._email=email;
            this._password=password;
            this._phone=phone;
            this._adress=adress;
            this._adress=adress;
            this._Userlevel=Userlevel;
            this._born=born;
            this._gender=gender;
        }
        #endregion
        #region Public Properties
        public virtual int User_id
        {
            get {return _user_id;}
            set {_user_id=value;}
        }
        public virtual string Fname
        {
            get {return _fname;}
            set {_fname=value;}
        }
        public virtual string Lname
        {
            get {return _lname;}
            set {_lname=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        public virtual string Phone
        {
            get {return _phone;}
            set {_phone=value;}
        }
        public virtual string Adress
        {
            get {return _adress;}
            set {_adress=value;}
        }
        public virtual string Adress
        {
            get {return _adress;}
            set {_adress=value;}
        }
        public virtual string Userlevel
        {
            get {return _Userlevel;}
            set {_Userlevel=value;}
        }
        public virtual unknown Born
        {
            get {return _born;}
            set {_born=value;}
        }
        public virtual string Gender
        {
            get {return _gender;}
            set {_gender=value;}
        }
        #endregion
    }
    #endregion
}