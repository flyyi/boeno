using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using System.Runtime.InteropServices;
using System.Reflection;
namespace smsDll_Demo
{
    public partial class Form1 : Form
    {
        [DllImport(@"httpsms.dll", CallingConvention = CallingConvention.StdCall)]
        public static extern string submitsms(string accname, string accpwd, string mobile, string dtime, string msg);//提交短信
        [DllImport(@"httpsms.dll", CallingConvention = CallingConvention.StdCall)]
        public static extern string getbalance(string name, string pwd);//查询余额
        [DllImport(@"httpsms.dll", CallingConvention = CallingConvention.StdCall)]
        public static extern string changepwd(string accname, string accpwd, string newpwd);//修改密码
        public Form1()
        {
            InitializeComponent();
        }
        string previewTime = null;
        string msTime = null;
        //提交短信
        private void btnsend_Click(object sender, EventArgs e)
        {
            //定时短信
            if (ckbAtTime.Checked)
            {
                if (checkTime())
                {
                    string tmp = submitsms(txbAccount.Text, txbAccountpwd.Text, txbTel.Text, msTime, txbContent.Text);
                    if (tmp == "0")
                    {
                        MessageBox.Show("发送成功！");

                    }
                    else
                        MessageBox.Show("发送失败！");
                }
            }
            else //普通短信
            {
                string tmp = submitsms(txbAccount.Text, txbAccountpwd.Text, txbTel.Text,"", txbContent.Text);
                if (tmp == "0")
                {
                    MessageBox.Show("发送成功！");
                 
                     
                }
                else
                    MessageBox.Show("发送失败！");
            }
        }
        //定时时间处理
        private bool checkTime()
        {

            //定时  
            string dateStr = dateTimePicker1.Value.Date.ToString("yyyyMMdd");
            string hhStr = numericUpDownHour.Value.ToString();
            string mmStr = numericUpDownMinute.Value.ToString();
            if (hhStr.Length == 1)
                hhStr = "0" + hhStr;
            if (mmStr.Length == 1)
                mmStr = "0" + mmStr;
            previewTime = dateTimePicker1.Value.ToShortDateString() + " " + hhStr + ":" + mmStr + ":" + "00";

            if (IsValueDate(previewTime))
            {
                msTime = dateStr + hhStr + mmStr + "00";
                return true;
            }
            else
            {
                MessageBox.Show("定时短信发送时间不得小于当前时间，并且不得大于一年！");
                return false;
            }
        }
        //判断时间是否有效
        static bool IsValueDate(string dateStr)
        {
            bool flag = false;
            try
            {
                DateTime mydate = Convert.ToDateTime(dateStr);
                DateTime nowStr = System.DateTime.Now;
                TimeSpan tspan = mydate - nowStr;
                if ((tspan.Minutes > 0) && (tspan.Days <= 365))
                {
                    flag = true;
                }
                else
                {
                    flag = false;
                }

            }
            catch
            {
                flag = false;
            }
            return flag;
        }
        //查询余额
        private void btnBalance_Click(object sender, EventArgs e)
        {
            MessageBox.Show("剩余短信条数:" + decimal.Parse(getbalance(txbAccount.Text, txbAccountpwd.Text))*10 + "条");
        }
        //修改密码
        private void btnModifypwd_Click(object sender, EventArgs e)
        {
            string temp = changepwd(txbAccount.Text, txbAccountpwd.Text, txbAccountNewPwd.Text.Trim());
            if (temp == "0")
            {
                MessageBox.Show("修改成功！");


            }
            else
                MessageBox.Show("修改失败！");
        }
    }
}