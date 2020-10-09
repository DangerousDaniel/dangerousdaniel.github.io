/*
 * Name: Daniel Cox
 * Date: Oct 22 - Oct 25, 2019
 * Title: Quiz Builder 1.0
 * Type: Android
 * Description: A quiz with any questions and answers you want.
 * Note: question do not loop
 */

package com.example.quizbuilder10;

//imports
import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.content.res.AssetManager;
import android.os.Bundle;
import android.view.View;
import android.widget.*;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {

    //Class Variables
    EditText nameEditText;
    Button startQuizButton;
    public static String name;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //connect up the widgets
       nameEditText = findViewById(R.id.nameEditText);
       startQuizButton = findViewById(R.id.startQuizButton);

        //when you click the button to start the quiz
        startQuizButton.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {

                //change screen to quiz screen
                Intent i = new Intent("ActivityTwo");//create intent object

                //store name for later use
                name = nameEditText.getText().toString();

                if (name.equals(""))
                {
                    Context context = getApplicationContext();
                    int duration = Toast.LENGTH_LONG;
                    Toast toast = Toast.makeText(context, "Enter a name", duration);
                    toast.show();
                }
                else
                {
                    //start the activity
                    startActivity(i);
                }

            }
        });

    }
}
