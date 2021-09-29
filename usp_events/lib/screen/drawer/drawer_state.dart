import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:usp_events/api/api.dart';
import 'package:usp_events/screen/sign_up/login.dart';

class AppDrawer extends StatefulWidget {
  @override
  _AppDrawerState createState() => _AppDrawerState();
}

class _AppDrawerState extends State<AppDrawer> {
  @override
  Widget build(BuildContext context) {
    return Drawer(
      child: ListView(
        padding: EdgeInsets.zero,
        children: [
          const UserAccountsDrawerHeader(
            accountEmail: Text('@User'),
            accountName: Text('user'),
            decoration: BoxDecoration(
              color: Colors.cyan,
            ),
            currentAccountPicture: CircleAvatar(
              backgroundImage: AssetImage("assets/images/user.png"),
              backgroundColor: Colors.grey,
            ),
          ),
          ListTile(
            leading: Icon(Icons.event),
            title: const Text('Events'),
            onTap: () {},
          ),
          ListTile(
            leading: Icon(Icons.save),
            title: const Text('Saved'),
            onTap: () {},
          ),
          ListTile(
            leading: Icon(Icons.chat_bubble),
            title: const Text('Chat'),
            onTap: () {},
          ),
          ListTile(
            leading: Icon(Icons.quiz_rounded),
            title: const Text('Quiz'),
            onTap: () {},
          ),
          ListTile(
            leading: Icon(Icons.person),
            title: const Text('Profile'),
            onTap: () {},
          ),
          ListTile(
            leading: Icon(Icons.logout),
            title: const Text('Logout'),
            onTap: logout,
          ),
        ],
      ),
    );
  }

  void logout() async {
    SharedPreferences localStorage = await SharedPreferences.getInstance();
    var data = localStorage.getString('token');
    var token = 'Bearer $data';
    print(token);

    var res = await CallApi().logoutPostData(token, 'logout');
    var body = json.decode(res.body);
    print(body);

    if (body['success'] == true) {
      localStorage.remove('user');
      localStorage.remove('token');
      Navigator.push(
          context, new MaterialPageRoute(builder: (context) => Login()));
    }
  }
}
