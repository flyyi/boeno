namespace smsDll_Demo
{
    partial class Form1
    {
        /// <summary>
        /// 必需的设计器变量。
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// 清理所有正在使用的资源。
        /// </summary>
        /// <param name="disposing">如果应释放托管资源，为 true；否则为 false。</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows 窗体设计器生成的代码

        /// <summary>
        /// 设计器支持所需的方法 - 不要
        /// 使用代码编辑器修改此方法的内容。
        /// </summary>
        private void InitializeComponent()
        {
            this.label2 = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.lblSmCount = new System.Windows.Forms.Label();
            this.ckbAtTime = new System.Windows.Forms.CheckBox();
            this.label6 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.numericUpDownMinute = new System.Windows.Forms.NumericUpDown();
            this.label3 = new System.Windows.Forms.Label();
            this.numericUpDownHour = new System.Windows.Forms.NumericUpDown();
            this.dateTimePicker1 = new System.Windows.Forms.DateTimePicker();
            this.txbAccountpwd = new System.Windows.Forms.TextBox();
            this.txbContent = new System.Windows.Forms.TextBox();
            this.lblaccount = new System.Windows.Forms.Label();
            this.lblcontent = new System.Windows.Forms.Label();
            this.txbAccount = new System.Windows.Forms.TextBox();
            this.txbTel = new System.Windows.Forms.TextBox();
            this.lblaccountpwd = new System.Windows.Forms.Label();
            this.lbltel = new System.Windows.Forms.Label();
            this.btnBalance = new System.Windows.Forms.Button();
            this.btnsend = new System.Windows.Forms.Button();
            this.txbAccountNewPwd = new System.Windows.Forms.TextBox();
            this.label5 = new System.Windows.Forms.Label();
            this.btnModifypwd = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.numericUpDownMinute)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.numericUpDownHour)).BeginInit();
            this.SuspendLayout();
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(312, 100);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(185, 12);
            this.label2.TabIndex = 41;
            this.label2.Text = "多个手机号码，以半角逗号分割。";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(406, 344);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(95, 12);
            this.label1.TabIndex = 40;
            this.label1.Text = "最长支持325字。";
            // 
            // lblSmCount
            // 
            this.lblSmCount.AutoSize = true;
            this.lblSmCount.Location = new System.Drawing.Point(70, 315);
            this.lblSmCount.Name = "lblSmCount";
            this.lblSmCount.Size = new System.Drawing.Size(0, 12);
            this.lblSmCount.TabIndex = 39;
            // 
            // ckbAtTime
            // 
            this.ckbAtTime.AutoSize = true;
            this.ckbAtTime.Location = new System.Drawing.Point(27, 344);
            this.ckbAtTime.Name = "ckbAtTime";
            this.ckbAtTime.Size = new System.Drawing.Size(72, 16);
            this.ckbAtTime.TabIndex = 38;
            this.ckbAtTime.Text = "定时短信";
            this.ckbAtTime.UseVisualStyleBackColor = true;
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(35, 158);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(0, 12);
            this.label6.TabIndex = 37;
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(322, 346);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(17, 12);
            this.label4.TabIndex = 36;
            this.label4.Text = "分";
            // 
            // numericUpDownMinute
            // 
            this.numericUpDownMinute.Location = new System.Drawing.Point(278, 341);
            this.numericUpDownMinute.Maximum = new decimal(new int[] {
            60,
            0,
            0,
            0});
            this.numericUpDownMinute.Name = "numericUpDownMinute";
            this.numericUpDownMinute.Size = new System.Drawing.Size(38, 21);
            this.numericUpDownMinute.TabIndex = 35;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(255, 344);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(17, 12);
            this.label3.TabIndex = 34;
            this.label3.Text = "时";
            // 
            // numericUpDownHour
            // 
            this.numericUpDownHour.Location = new System.Drawing.Point(211, 340);
            this.numericUpDownHour.Maximum = new decimal(new int[] {
            60,
            0,
            0,
            0});
            this.numericUpDownHour.Name = "numericUpDownHour";
            this.numericUpDownHour.Size = new System.Drawing.Size(38, 21);
            this.numericUpDownHour.TabIndex = 33;
            // 
            // dateTimePicker1
            // 
            this.dateTimePicker1.Format = System.Windows.Forms.DateTimePickerFormat.Short;
            this.dateTimePicker1.Location = new System.Drawing.Point(105, 340);
            this.dateTimePicker1.Name = "dateTimePicker1";
            this.dateTimePicker1.Size = new System.Drawing.Size(100, 21);
            this.dateTimePicker1.TabIndex = 32;
            this.dateTimePicker1.Value = new System.DateTime(2012, 4, 10, 0, 0, 0, 0);
            // 
            // txbAccountpwd
            // 
            this.txbAccountpwd.Location = new System.Drawing.Point(72, 40);
            this.txbAccountpwd.Name = "txbAccountpwd";
            this.txbAccountpwd.PasswordChar = '*';
            this.txbAccountpwd.Size = new System.Drawing.Size(234, 21);
            this.txbAccountpwd.TabIndex = 27;
            // 
            // txbContent
            // 
            this.txbContent.Location = new System.Drawing.Point(72, 123);
            this.txbContent.MaxLength = 500;
            this.txbContent.Multiline = true;
            this.txbContent.Name = "txbContent";
            this.txbContent.Size = new System.Drawing.Size(429, 207);
            this.txbContent.TabIndex = 31;
            // 
            // lblaccount
            // 
            this.lblaccount.AutoSize = true;
            this.lblaccount.Location = new System.Drawing.Point(25, 17);
            this.lblaccount.Name = "lblaccount";
            this.lblaccount.Size = new System.Drawing.Size(41, 12);
            this.lblaccount.TabIndex = 24;
            this.lblaccount.Text = "账户：";
            // 
            // lblcontent
            // 
            this.lblcontent.AutoSize = true;
            this.lblcontent.Location = new System.Drawing.Point(25, 127);
            this.lblcontent.Name = "lblcontent";
            this.lblcontent.Size = new System.Drawing.Size(41, 12);
            this.lblcontent.TabIndex = 30;
            this.lblcontent.Text = "内容：";
            // 
            // txbAccount
            // 
            this.txbAccount.Location = new System.Drawing.Point(72, 13);
            this.txbAccount.Name = "txbAccount";
            this.txbAccount.Size = new System.Drawing.Size(234, 21);
            this.txbAccount.TabIndex = 25;
            // 
            // txbTel
            // 
            this.txbTel.Location = new System.Drawing.Point(72, 96);
            this.txbTel.Name = "txbTel";
            this.txbTel.Size = new System.Drawing.Size(234, 21);
            this.txbTel.TabIndex = 29;
            // 
            // lblaccountpwd
            // 
            this.lblaccountpwd.AutoSize = true;
            this.lblaccountpwd.Location = new System.Drawing.Point(25, 44);
            this.lblaccountpwd.Name = "lblaccountpwd";
            this.lblaccountpwd.Size = new System.Drawing.Size(41, 12);
            this.lblaccountpwd.TabIndex = 26;
            this.lblaccountpwd.Text = "密码：";
            // 
            // lbltel
            // 
            this.lbltel.AutoSize = true;
            this.lbltel.Location = new System.Drawing.Point(25, 100);
            this.lbltel.Name = "lbltel";
            this.lbltel.Size = new System.Drawing.Size(41, 12);
            this.lbltel.TabIndex = 28;
            this.lbltel.Text = "号码：";
            // 
            // btnBalance
            // 
            this.btnBalance.Location = new System.Drawing.Point(174, 377);
            this.btnBalance.Name = "btnBalance";
            this.btnBalance.Size = new System.Drawing.Size(75, 23);
            this.btnBalance.TabIndex = 43;
            this.btnBalance.Text = "查询余额";
            this.btnBalance.UseVisualStyleBackColor = true;
            this.btnBalance.Click += new System.EventHandler(this.btnBalance_Click);
            // 
            // btnsend
            // 
            this.btnsend.Location = new System.Drawing.Point(72, 377);
            this.btnsend.Name = "btnsend";
            this.btnsend.Size = new System.Drawing.Size(75, 23);
            this.btnsend.TabIndex = 42;
            this.btnsend.Text = "发送短信";
            this.btnsend.UseVisualStyleBackColor = true;
            this.btnsend.Click += new System.EventHandler(this.btnsend_Click);
            // 
            // txbAccountNewPwd
            // 
            this.txbAccountNewPwd.Location = new System.Drawing.Point(72, 69);
            this.txbAccountNewPwd.Name = "txbAccountNewPwd";
            this.txbAccountNewPwd.PasswordChar = '*';
            this.txbAccountNewPwd.Size = new System.Drawing.Size(234, 21);
            this.txbAccountNewPwd.TabIndex = 45;
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(17, 72);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(53, 12);
            this.label5.TabIndex = 44;
            this.label5.Text = "新密码：";
            // 
            // btnModifypwd
            // 
            this.btnModifypwd.Location = new System.Drawing.Point(278, 377);
            this.btnModifypwd.Name = "btnModifypwd";
            this.btnModifypwd.Size = new System.Drawing.Size(75, 23);
            this.btnModifypwd.TabIndex = 46;
            this.btnModifypwd.Text = "修改密码";
            this.btnModifypwd.UseVisualStyleBackColor = true;
            this.btnModifypwd.Click += new System.EventHandler(this.btnModifypwd_Click);
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 12F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(552, 443);
            this.Controls.Add(this.btnModifypwd);
            this.Controls.Add(this.txbAccountNewPwd);
            this.Controls.Add(this.label5);
            this.Controls.Add(this.btnBalance);
            this.Controls.Add(this.btnsend);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.lblSmCount);
            this.Controls.Add(this.ckbAtTime);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.numericUpDownMinute);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.numericUpDownHour);
            this.Controls.Add(this.dateTimePicker1);
            this.Controls.Add(this.txbAccountpwd);
            this.Controls.Add(this.txbContent);
            this.Controls.Add(this.lblaccount);
            this.Controls.Add(this.lblcontent);
            this.Controls.Add(this.txbAccount);
            this.Controls.Add(this.txbTel);
            this.Controls.Add(this.lblaccountpwd);
            this.Controls.Add(this.lbltel);
            this.Name = "Form1";
            this.Text = "Form1";
            ((System.ComponentModel.ISupportInitialize)(this.numericUpDownMinute)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.numericUpDownHour)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label lblSmCount;
        private System.Windows.Forms.CheckBox ckbAtTime;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.NumericUpDown numericUpDownMinute;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.NumericUpDown numericUpDownHour;
        private System.Windows.Forms.DateTimePicker dateTimePicker1;
        private System.Windows.Forms.TextBox txbAccountpwd;
        private System.Windows.Forms.TextBox txbContent;
        private System.Windows.Forms.Label lblaccount;
        private System.Windows.Forms.Label lblcontent;
        private System.Windows.Forms.TextBox txbAccount;
        private System.Windows.Forms.TextBox txbTel;
        private System.Windows.Forms.Label lblaccountpwd;
        private System.Windows.Forms.Label lbltel;
        private System.Windows.Forms.Button btnBalance;
        private System.Windows.Forms.Button btnsend;
        private System.Windows.Forms.TextBox txbAccountNewPwd;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Button btnModifypwd;
    }
}

