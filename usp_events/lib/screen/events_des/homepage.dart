import 'package:flutter/material.dart';

import '../drawer/drawer_state.dart';

class Homepage extends StatefulWidget {
  _Homepage createState() => _Homepage();
}

class _Homepage extends State<Homepage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.cyan.shade600,
        title: Text("Events"),
      ),
      drawer: AppDrawer(),
      body: Column(children: [
        Expanded(
          child: ListView.builder(
            itemCount: 5,
            itemBuilder: (BuildContext context, int idx) {
              return Card(
                elevation: 2.0,
                color: Colors.amber.shade100,
                child: Padding(
                  padding: EdgeInsets.all(25.0),
                  child: ListTile(
                    title: new Center(
                      child: new Text(
                        "Event " + idx.toString(),
                        style: new TextStyle(
                            fontWeight: FontWeight.w500,
                            fontSize: 25.0,
                            color: Colors.black),
                      ),
                    ),
                    subtitle: new Center(
                      child: new Text("Description"),
                    ),
                    onTap: () {},
                  ),
                ),
              );
            },
          ),
        )
      ]),
    );
  }
}
