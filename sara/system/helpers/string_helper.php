lowMemoryWarningCount max 	maxMemory msg n next node nodes normalizeNodes object objectsToSearch ok org/openide/ErrorManager org/openide/loaders/DataObject org/openide/nodes/Node org/openide/util/NbBundle )org/openidex/search/DataObjectSearchGroup org/openidex/search/SearchGroup org/openidex/search/SearchInfo org/openidex/search/SearchType org/openidex/search/Utils path pathNode processSearchObject put required result rt searchRoots 
searchType size stopped this throwNoMemory toArray total totalMemory tryGC          9 : ; < = > ? @ A B C R S T U V W X Y Z Ljava/lang/Boolean; Ljava/lang/Class; Ljava/lang/Object; Ljava/lang/OutOfMemoryError; Ljava/lang/Runtime; Ljava/lang/RuntimeException; Ljava/lang/String; Ljava/util/Iterator; Ljava/util/List; Ljava/util/Map; Ljava/util/Set; Lorg/openide/nodes/Node; +Lorg/openidex/search/DataObjectSearchGroup;  Lorg/openidex/search/SearchInfo;  Lorg/openidex/search/SearchType; 6Ljava/util/Iterator<Lorg/openide/loaders/DataObject;>; *Ljava/util/List<Lorg/openide/nodes/Node;>; <Ljava/util/Map<Lorg/openide/nodes/Node;Ljava/lang/Boolean;>; ()[Ljava/lang/Class; ()Ljava/lang/Object; (Ljava/lang/Object;)V (Ljava/lang/Object;)Z ()Ljava/lang/Runtime; (Ljava/lang/String;)V ()Ljava/util/Iterator; ()Lorg/openide/ErrorManager; ()Lorg/openide/nodes/Node; #(Lorg/openidex/search/SearchType;)V (([Ljava/lang/Object;)[Ljava/lang/Object; ,(Ljava/lang/Object;)Lorg/openide/nodes/Node; 4([Lorg/openide/nodes/Node;)[Lorg/openide/nodes/Node; :(Lorg/openide/nodes/Node;)Lorg/openidex/search/SearchInfo; 8(Ljava/lang/Object;Ljava/lang/Object;)Ljava/lang/Object; 7(Ljava/lang/Class;Ljava/lang/String;)Ljava/lang/String; v(Ljava/lang/Throwable;ILjava/lang/String;Ljava/lang/String;Ljava/lang/Throwable;Ljava/util/Date;)Ljava/lang/Throwable;       F  E  e   �  � b � d  (  H  j    "  g  3   	  
   G  1 � K � ] �  � # � / �  � 7 � P � * � , � . �  � h � N � 0 � ^ � + �  �	 p �	 p �	  �	  �	  �	  �	  �	  �	  �
 q �
 s �
 s �
 s �
 s �
 t �
 u �
 v �
 { �
 { �
 | �
 } �
 ~ �
  �
  �
  �
  �
 � �
 � �
 � �
 � � w � w � x � x � x � x � x � y � y � z � z � � � Code DataObjectSearchGroup.java LineNumberTable LocalVariableTable LocalVariableTypeTable 
SourceFile StackMapTable !  �    
 E    
 F    
     
     
          �   /     *� �    �       H �        f �     �  �   �     8=+� �N-�66� -2: |� =� 	����� *+� �    �    �    � n  �  �   & 	   S  T  U # V % W ( T . Z 2 [ 7 ] �   H    ! �   '     # D      4     8 f �     8 c �   6 Q    $   �  a     �*� �*� ׹ � � }� � � o� �L� �� Բ �� �+M,�>6� K,2:� �:� 3� � :� � �  *� ֙ �� �� �*� � � ��܄����    �   ' � 3   o o  �   } � w� �  �   6    f  i   j $ k + m ? n F o K p ^ q f r m s { m � w �   R  T ' 8 �  F 5 5 �  ? < L �  - T    0 Q D   3 N 4     � f �    f M   �     T ' 8 �  
    �  h  
   �� �M,� �B,� �7! lm� �`�� �7!�� 1,� ��� '� ��:		KT:	�:	� � � է � ՙ � ղ �`� Բ �� !�� ,� ٲ ҅�� � �  4 D E r  �    � E  s  r �   R    �  � 	 �  �  � 0 � 4 � ; � A � D � E � G � J � M � T � Z � ^ � f � � � � � �   R  ; 
 )  	 G  % � 	   � &      � k    � a �  	 | i    v G    f _   
 g   �   d     $� tY� �K � �L� �* +� �W*�    �       � 
 �  � " � �     
  ' �     I �   - �  �   V     +� |� �+� |� �    �    	 �        	
 �        f �      O �  
 N �  �  4    W*�� *�� vY*�h� �L� vY*�h� �M� uY
� �N� uY*�� �:*:�66� 2:+� Ϲ � W����*:�66� �2:-� � 6	� �:

� 5+
� � � 	6	� $,
� � � � -
� � W
� �:
���	� ?+� й � W-� � :

� � � 
� � � }:+� й � W��ާ :-� � :

� � � 
� � � }:,� й � W���ace('#(^|[^:])//+#', '\\1/', $str);
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('reduce_multiples'))
{
	/**
	 * Reduce Multiples
	 *
	 * Reduces multiple instances of a particular character.  Example:
	 *
	 * Fred, Bill,, Joe, Jimmy
	 *
	 * becomes:
	 *
	 * Fred, Bill, Joe, Jimmy
	 *
	 * @param	string
	 * @param	string	the character you wish to reduce
	 * @param	bool	TRUE/FALSE - whether to trim the character from the beginning/end
	 * @return	string
	 */
	function reduce_multiples($str, $character = ',', $trim = FALSE)
	{
		$str = preg_replace('#'.preg_quote($character, '#').'{2,}#', $character, $str);
		return ($trim === TRUE) ? trim($str, $character) : $str;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('random_string'))
{
	/**
	 * Create a Random String
	 *
	 * Useful for generating passwords or hashes.
	 *
	 * @param	string	type of random string.  basic, alpha, alnum, numeric, nozero, unique, md5, encrypt and sha1
	 * @param	int	number of characters
	 * @return	string
	 */
	function random_string($type = 'alnum', $len = 8)
	{
		switch ($type)
		{
			case 'basic':
				return mt_rand();
			case 'alnum':
			case 'numeric':
			case 'nozero':
			case 'alpha':
				switch ($type)
				{
					case 'alpha':
						$pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'alnum':
						$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'numeric':
						$pool = '0123456789';
						break;
					case 'nozero':
						$pool = '123456789';
						break;
				}
				return substr(str_shuffle(str_repeat($pool, ceil($len / strlen($pool)))), 0, $len);
			case 'unique': // todo: remove in 3.1+
			case 'md5':
				return md5(uniqid(mt_rand()));
			case 'encrypt': // todo: remove in 3.1+
			case 'sha1':
				return sha1(uniqid(mt_rand(), TRUE));
		}
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('increment_string'))
{
	/**
	 * Add's _1 to a string or increment the ending number to allow _2, _3, etc
	 *
	 * @param	string	required
	 * @param	string	What should the duplicate number be appended with
	 * @param	string	Which number should be used for the first dupe increment
	 * @return	string
	 */
	function increment_string($str, $separator = '_', $first = 1)
	{
		preg_match('/(.+)'.preg_quote($separator, '/').'([0-9]+)$/', $str, $match);
		return isset($match[2]) ? $match[1].$separator.($match[2] + 1) : $str.$separator.$first;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('alternator'))
{
	/**
	 * Alternator
	 *
	 * Allows strings to be alternated. See docs...
	 *
	 * @param	string (as many parameters as needed)
	 * @return	string
	 */
	function alternator($args)
	{
		static $i;

		if (func_num_args() === 0)
		{
			$i = 0;
			return '';
		}
		$args = func_get_args();
		return $args[($i++ % count($args))];
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('repeater'))
{
	/**
	 * Repeater function
	 *
	 * @todo	Remove in version 3.1+.
	 * @deprecated	3.0.0	This is just an alias for PHP's native str_repeat()
	 *
	 * @param	string	$data	String to repeat
	 * @param	int	$num	Number of repeats
	 * @return	string
	 */
	function repeater($data, $num = 1)
	{
		return ($num > 0) ? str_repeat($data, $num) : '';
	}
}
