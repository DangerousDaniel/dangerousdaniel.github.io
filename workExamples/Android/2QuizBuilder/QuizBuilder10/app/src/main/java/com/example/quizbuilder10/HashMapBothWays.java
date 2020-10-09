/*
 * Name: Daniel Cox
 * Date: Oct 22 - Oct 25, 2019
 * Title: Quiz Builder 1.0
 * Type: Android
 */

//this code below is from d2l

package com.example.quizbuilder10;

import java.util.Hashtable;
import java.util.Map;

public class HashMapBothWays <K extends Object, V extends Object>
{

    private Map<K,V> forward = new Hashtable<K, V>();
    private Map<V,K> backward = new Hashtable<V, K>();

    public synchronized void add(K key, V value) {
        forward.put(key, value);
        backward.put(value, key);
    }

    public synchronized V getForward(K key) {
        return forward.get(key);
    }

    public synchronized K getBackward(V key) {
        return backward.get(key);
    }

}
